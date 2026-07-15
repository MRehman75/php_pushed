<?php
include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id,name,password FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $user = $result->fetch_assoc();

        if(password_verify($password,$user['password'])){

            $_SESSION['user_id']=$user['id'];
            $_SESSION['user_name']=$user['name'];

            echo "success";

        }else{

            echo '<div class="alert alert-danger">Incorrect Password.</div>';

        }

    }else{

        echo '<div class="alert alert-danger">User not found.</div>';

    }

}
?>