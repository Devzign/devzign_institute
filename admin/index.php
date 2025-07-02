<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></h1>
<ul>
    <li><a href="users.php">Manage Users</a></li>
    <li><a href="courses.php">Manage Courses</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>
