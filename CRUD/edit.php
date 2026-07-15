<?php
include 'config.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

?>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    Name:<br>
    <input type="text" name="name" value="<?= $row['name']; ?>"><br><br>

    Email:<br>
    <input type="email" name="email" value="<?= $row['email']; ?>"><br><br>

    Phone:<br>
    <input type="text" name="phone" value="<?= $row['phone']; ?>"><br><br>

    <button type="submit">Update</button>
</form>