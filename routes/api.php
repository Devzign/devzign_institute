<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/CourseController.php';
require_once __DIR__ . '/../controllers/QuestionController.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';

$config = require __DIR__ . '/../config/config.php';
$db = new Database($config);

$authController = new AuthController($db->getConnection());
$courseController = new CourseController($db->getConnection());
$questionController = new QuestionController($db->getConnection());

$method = $_SERVER['REQUEST_METHOD'];
$path = $_GET['path'] ?? '';

header('Content-Type: application/json');

switch ("$method $path") {
    case 'POST auth/register':
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($authController->register($data));
        break;
    case 'POST auth/login':
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($authController->login($data['email'], $data['password']));
        break;
    case 'POST auth/logout':
        echo json_encode($authController->logout());
        break;

    case 'POST courses':
        requireRole(['tutor']);
        $data = json_decode(file_get_contents('php://input'), true);
        $data['tutor_id'] = $_SESSION['user']['id'];
        echo json_encode($courseController->create($data));
        break;
    case 'GET courses':
        echo json_encode($courseController->list());
        break;

    case 'POST questions':
        requireRole(['student']);
        $data = json_decode(file_get_contents('php://input'), true);
        $data['user_id'] = $_SESSION['user']['id'];
        echo json_encode($questionController->create($data));
        break;
    case 'GET questions':
        echo json_encode($questionController->list());
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);
}
