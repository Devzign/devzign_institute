<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

$config = require __DIR__ . '/../config/config.php';
$db = new Database($config);
$userModel = new User($db->getConnection());

// Simple admin login script. Replace the markup below with your own
// template if desired by editing this file and `assets/style.css`.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $userModel->findByEmail($_POST['email']);
    if ($user && password_verify($_POST['password'], $user['password']) && $user['role'] === 'admin') {
        $_SESSION['user'] = ['id' => $user['id'], 'role' => 'admin', 'name' => $user['name']];
        header('Location: index.php');
        exit;
    }
    $error = 'Invalid credentials';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="login">
<div class="login-container">
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo '<p class="error">' . htmlspecialchars($error) . '</p>'; ?>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
