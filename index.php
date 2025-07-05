<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/src/Router.php';
require_once __DIR__ . '/src/controllers/DashboardController.php';

use Src\Router; 
use Src\Controllers\DashboardController;

$router = new Router();
$router->get('/', [ DashboardController::class, 'index' ]);
$router->run();