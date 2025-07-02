<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/Database.php';

class AuthController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function register($data) {
        if ($this->user->findByEmail($data['email'])) {
            return ['error' => 'Email already exists'];
        }
        $data['role'] = $data['role'] ?? 'student';
        $data['devzign_id'] = uniqid('DZ');
        $this->user->create($data);
        return [
            'success' => true,
            'message' => 'Registration successful',
            'devzign_id' => $data['devzign_id']
        ];
    }

    public function login($email, $password) {
        $record = $this->user->findByEmail($email);
        if ($record && password_verify($password, $record['password'])) {
            $_SESSION['user'] = [
                'id' => $record['id'],
                'role' => $record['role'],
                'name' => $record['name']
            ];
            return ['success' => true];
        }
        return ['error' => 'Invalid credentials'];
    }

    public function logout() {
        session_destroy();
        return ['success' => true];
    }
}
