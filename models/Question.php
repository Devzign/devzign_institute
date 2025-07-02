<?php
class Question {
    private $db;
    private $table = 'questions';

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (user_id, title, body) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $data['user_id'], $data['title'], $data['body']);
        return $stmt->execute();
    }

    public function all() {
        return $this->db->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
    }
}
