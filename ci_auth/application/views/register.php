<!DOCTYPE html>
<html>

<head>

<title>Register Test</title>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>


<h2>Register</h2>


<form id="registerForm">

<input type="text" id="name" name="name" placeholder="Name">
<br><br>

<input type="email" id="email" name="email" placeholder="Email">
<br><br>

<input type="password" id="password" name="password" placeholder="Password">
<br><br>

<button type="submit">
Register
</button>

</form>


<div id="message"></div>



<script>

$(document).ready(function(){


$("#registerForm").on("submit",function(e){


e.preventDefault();


var name = $("#name").val();

var email = $("#email").val();

var password = $("#password").val();



console.log(name);

console.log(email);

console.log(password);



$.ajax({

url:"http://localhost/projects/ci_auth/index.php/auth/register",

type:"POST",

data:{

name:name,

email:email,

password:password

},


success:function(response){

console.log(response);

$("#message").html(response);

}


});


});


});


</script>


</body>

</html>