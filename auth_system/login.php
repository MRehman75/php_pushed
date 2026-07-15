<?php

session_start();

include 'includes/config.php';


if(isset($_POST['login'])){


$email=$_POST['email'];
$password=$_POST['password'];


$result=mysqli_query($conn,
"SELECT * FROM users WHERE email='$email'");


$user=mysqli_fetch_assoc($result);



if($user && password_verify($password, $user['password'])){

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];

    header("Location: dashboard.php");
    exit();

}
else{

    $error = "Invalid Email or Password";

}

}


?>


<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow p-4 mx-auto"
style="max-width:400px">


<h2 class="text-center">
Login
</h2>


<?php

if(isset($error))
echo "<div class='alert alert-danger'>$error</div>";

?>


<form method="POST">


<input class="form-control mb-3"
type="email"
name="email"
placeholder="Email"
required>


<input class="form-control mb-3"
type="password"
name="password"
placeholder="Password"
required>


<button class="btn btn-success w-100"
name="login">

Login

</button>


</form>


<p class="text-center mt-3">

New User?

<a href="register.php">
Register
</a>

</p>


</div>

</div>


</body>

</html>