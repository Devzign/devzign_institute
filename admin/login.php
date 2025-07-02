<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

$config = require __DIR__ . '/../config/config.php';
$db = new Database($config);
$userModel = new User($db->getConnection());

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
<head><title>Admin Login</title></head>
<body>
<form method="post">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<?php if (isset($error)) echo '<p>' . $error . '</p>'; ?>
</body>
</html>
