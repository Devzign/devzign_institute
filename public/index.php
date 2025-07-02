<?php
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/controllers/HelloController.php';

$router = new Router();
$router->get('/', [HelloController::class, 'index']);
$router->run();
