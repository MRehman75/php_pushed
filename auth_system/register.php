<?php
include 'includes/config.php';

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);


$query=mysqli_query($conn,
"INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");


if($query){

header("Location: login.php");
exit();

}

}

?>


<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow p-4 mx-auto" style="max-width:400px">


<h2 class="text-center mb-4">
Register
</h2>


<form method="POST">


<input class="form-control mb-3"
type="text"
name="name"
placeholder="Full Name"
required>


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


<button class="btn btn-primary w-100"
name="register">

Register

</button>


</form>


<p class="text-center mt-3">

Already have account?

<a href="login.php">
Login
</a>

</p>


</div>


</div>


</body>
</html>