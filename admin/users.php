<?php
session_start();
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
requireRole(['admin']);
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

$config = require __DIR__ . '/../config/config.php';
$db = new Database($config);
$userModel = new User($db->getConnection());
$users = $userModel->all();
?>
<!DOCTYPE html>
<html>
<head><title>Users</title></head>
<body>
<h1>Users</h1>
<table border="1">
<tr><th>ID</th><th>Email</th><th>Role</th><th>Name</th></tr>
<?php foreach ($users as $u): ?>
<tr>
<td><?php echo $u['id']; ?></td>
<td><?php echo htmlspecialchars($u['email']); ?></td>
<td><?php echo $u['role']; ?></td>
<td><?php echo htmlspecialchars($u['name']); ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
