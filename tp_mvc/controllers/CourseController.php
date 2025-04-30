<?php
class CourseController {
    private $db;
    private $course;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Course.php';
        
        $database = new Database();
        $db = $database->getConnection();
        
        $this->course = new Course($db);
    }

    // Show all courses
    public function index() {
        $result = $this->course->readAll();
        include 'views/courses/index.php';
    }

    // Show create form
    public function create() {
        include 'views/courses/create.php';
    }

    // Process form submission to store new course
    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->course->course_code = $_POST['course_code'];
            $this->course->course_name = $_POST['course_name'];
            $this->course->credits = $_POST['credits'];
            $this->course->description = $_POST['description'];
            
            if ($this->course->create()) {
                header("Location: index.php?action=courses");
                exit;
            } else {
                include 'views/courses/create.php';
            }
        }
    }

    // Show edit form
    public function edit($id) {
        $this->course->id = $id;
        if ($this->course->readOne()) {
            include 'views/courses/edit.php';
        } else {
            header("Location: index.php?action=courses");
            exit;
        }
    }

    // Process form submission to update course
    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->course->id = $_POST['id'];
            $this->course->course_code = $_POST['course_code'];
            $this->course->course_name = $_POST['course_name'];
            $this->course->credits = $_POST['credits'];
            $this->course->description = $_POST['description'];
            
            if ($this->course->update()) {
                header("Location: index.php?action=courses");
                exit;
            } else {
                include 'views/courses/edit.php';
            }
        }
    }

    // Delete a course
    public function delete($id) {
        $this->course->id = $id;
        if ($this->course->delete()) {
            header("Location: index.php?action=courses");
            exit;
        }
    }
}
?>