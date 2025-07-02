<?php
require_once __DIR__ . '/../models/Question.php';

class QuestionController {
    private $question;

    public function __construct($db) {
        $this->question = new Question($db);
    }

    public function create($data) {
        return $this->question->create($data);
    }

    public function list() {
        return $this->question->all();
    }
}
