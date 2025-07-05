<?php
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/controllers/DashboardController.php';

use Src\Controllers\DashboardController;

$router = new Router();

$router->get('/', [DashboardController::class, 'index']);

$router->run();
