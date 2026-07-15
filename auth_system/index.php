<!DOCTYPE html>
<html>
<head>

<title>Auth System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    height:100vh;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:400px;
    border-radius:20px;
}

.btn{
    border-radius:30px;
    padding:12px;
    font-size:18px;
}

</style>

</head>

<body>


<div class="card shadow p-5 text-center">

<h1 class="mb-3">
    Welcome
</h1>

<p class="text-muted">
    User Authentication System
</p>


<a href="register.php" class="btn btn-primary mb-3">
    Create Account
</a>


<a href="login.php" class="btn btn-success">
    Login
</a>


</div>


</body>
</html>