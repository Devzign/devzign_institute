<?php
class User {
    private $db;
    private $table = 'users';

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (email, password, role, name, devzign_id) VALUES (?, ?, ?, ?, ?)");
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->bind_param('sssss', $data['email'], $password, $data['role'], $data['name'], $data['devzign_id']);
        return $stmt->execute();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ? LIMIT 1");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function all() {
        return $this->db->query("SELECT id, email, role, name, devzign_id FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
    }
}
