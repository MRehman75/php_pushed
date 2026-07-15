<?php
include 'config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users (name, email, phone)
        VALUES ('$name', '$email', '$phone')";
mysqli_query($conn, $sql);
header("Location: index.php");
exit;
?>