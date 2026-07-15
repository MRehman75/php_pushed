<?php
include 'config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone' WHERE id=$id";
 mysqli_query($conn, $sql);
 header("Location: index.php");
 exit;
?>