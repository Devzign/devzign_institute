<?php
require_once __DIR__ . '/../models/Course.php';

class CourseController {
    private $course;

    public function __construct($db) {
        $this->course = new Course($db);
    }

    public function create($data) {
        return $this->course->create($data);
    }

    public function list() {
        return $this->course->all();
    }
}
