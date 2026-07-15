<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<html>
<head>
<title>CRUD Appllication</title>
</head>
<body>
<h2>Users</h2>
<a href = create.php>ADD User</create></a>
<table border="2" cellpadding="20">
<tr>
<th>ID</th>
<th>NAME</th>
<th>Email</th>
<th>Phone</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['phone']; ?></td>
    <td>
    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
    <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</tr>
</table>
</body>
</html>
