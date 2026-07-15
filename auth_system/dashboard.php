<?php

session_start();

include 'includes/config.php';

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
    background:#f4f6f9;
}

.profile-card{

    max-width:500px;
    margin:80px auto;
    border-radius:20px;

}

.profile-icon{

    width:100px;
    height:100px;
    background:#0d6efd;
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:45px;
    margin:auto;

}

</style>


</head>


<body>


<div class="container">


<div class="card shadow p-5 text-center profile-card">


<div class="profile-icon">

<?php echo strtoupper(substr($_SESSION['user_name'],0,1)); ?>

</div>


<h2 class="mt-3">

Welcome, 
<?php echo htmlspecialchars($_SESSION['user_name']); ?>

</h2>


<p class="text-success">

Login Successfully

</p>


<hr>


<div class="text-start">


<h5>Profile Information</h5>


<p>
<strong>Name:</strong>

<?php echo htmlspecialchars($_SESSION['user_name']); ?>

</p>


<p>
<strong>Email:</strong>

<?php echo htmlspecialchars($_SESSION['user_email']); ?>

</p>


<p>
<strong>User ID:</strong>

<?php echo $_SESSION['user_id']; ?>

</p>


</div>



<a href="logout.php" class="btn btn-danger mt-3">

Logout

</a>


</div>


</div>


</body>

</html>