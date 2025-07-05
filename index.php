<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// point _into_ your project, not above it:
require_once __DIR__ . '/src/Router.php';
require_once __DIR__ . '/src/controllers/DashboardController.php';

use Src\Controllers\DashboardController;

$router = new Router();

// 3) Use positional args (no named params) to match your Router::get signature
$router->get('/', [ DashboardController::class, 'index' ]);

$router->run();
