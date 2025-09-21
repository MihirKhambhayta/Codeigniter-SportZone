<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= $this->session->userdata('admin_username'); ?>!</h2>
    <p>This is the Admin Dashboard.</p>
    <a href="<?= site_url('admin/logout') ?>">Logout</a>
</body>
</html>
