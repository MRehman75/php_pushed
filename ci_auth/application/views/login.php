<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>


<body>


<div class="container mt-5">

<h2>Login</h2>


<form id="loginForm">


<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email">


<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password">


<button class="btn btn-primary">
Login
</button>

<br>

<a href="<?=base_url('register')?>">

Create new account

</a>

</form>


<p id="message"></p>


</div>



<script>

$("#loginForm").submit(function(e){

e.preventDefault();


$.ajax({

url:"<?=base_url('auth/login')?>",

type:"POST",

data:$(this).serialize(),

dataType:"json",


success:function(res)
{

$("#message").html(res.message);


if(res.status)
{
window.location=res.redirect;
}

}


});


});


</script>


</body>

</html>