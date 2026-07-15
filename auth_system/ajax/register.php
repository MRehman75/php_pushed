<?php
include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        echo '<div class="alert alert-danger">All fields are required.</div>';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Invalid Email Address.</div>';
        exit;
    }

    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo '<div class="alert alert-warning">Email already exists.</div>';
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
    $stmt->bind_param("sss", $name, $email, $hash);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo '<div class="alert alert-danger">Registration Failed.</div>';
    }
}
?>