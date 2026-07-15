<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>

<body>

<h2>Welcome, <?= $this->session->userdata('name'); ?></h2>

<p>Email: <?= $this->session->userdata('email'); ?></p>

<a href="<?= base_url('index.php/auth/logout'); ?>">
    Logout
</a>

</body>
</html>