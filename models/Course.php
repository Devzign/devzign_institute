<?php
class Course {
    private $db;
    private $table = 'courses';

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (title, description, tutor_id, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssii', $data['title'], $data['description'], $data['tutor_id'], $data['price']);
        return $stmt->execute();
    }

    public function all() {
        return $this->db->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
    }
}
