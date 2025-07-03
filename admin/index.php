<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Question.php';

$config = require __DIR__ . '/../config/config.php';
$db = new Database($config);
$userModel = new User($db->getConnection());
$courseModel = new Course($db->getConnection());
$questionModel = new Question($db->getConnection());

$userCount = count($userModel->all());
$courseCount = count($courseModel->all());
$questionCount = count($questionModel->all());
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="dashboard-nav">
    Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?> |
    <a href="users.php">Users</a>
    <a href="courses.php">Courses</a>
    <a href="logout.php">Logout</a>
</div>

<div class="dashboard-stats">
    <div class="stat-box">
        <strong>Users</strong><br>
        <?php echo $userCount; ?>
    </div>
    <div class="stat-box">
        <strong>Courses</strong><br>
        <?php echo $courseCount; ?>
    </div>
    <div class="stat-box">
        <strong>Questions</strong><br>
        <?php echo $questionCount; ?>
    </div>
</div>
</body>
</html>
