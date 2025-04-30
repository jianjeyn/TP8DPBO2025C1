<?php
class EnrollmentController {
    private $db;
    private $enrollment;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Enrollment.php';
        
        $database = new Database();
        $db = $database->getConnection();
        
        $this->enrollment = new Enrollment($db);
    }

    // Show all enrollments
    public function index() {
        $result = $this->enrollment->readAll();
        include 'views/enrollments/index.php';
    }

    // Show create form
    public function create() {
        $students = $this->enrollment->getStudents();
        $courses = $this->enrollment->getCourses();
        include 'views/enrollments/create.php';
    }

    // Process form submission to store new enrollment
    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->enrollment->student_id = $_POST['student_id'];
            $this->enrollment->course_id = $_POST['course_id'];
            $this->enrollment->enrollment_date = $_POST['enrollment_date'];
            $this->enrollment->grade = $_POST['grade'];
            
            if ($this->enrollment->create()) {
                header("Location: index.php?action=enrollments");
                exit;
            } else {
                $students = $this->enrollment->getStudents();
                $courses = $this->enrollment->getCourses();
                include 'views/enrollments/create.php';
            }
        }
    }

    // Show edit form
    public function edit($id) {
        $this->enrollment->id = $id;
        if ($this->enrollment->readOne()) {
            $students = $this->enrollment->getStudents();
            $courses = $this->enrollment->getCourses();
            include 'views/enrollments/edit.php';
        } else {
            header("Location: index.php?action=enrollments");
            exit;
        }
    }

    // Process form submission to update enrollment
    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->enrollment->id = $_POST['id'];
            $this->enrollment->student_id = $_POST['student_id'];
            $this->enrollment->course_id = $_POST['course_id'];
            $this->enrollment->enrollment_date = $_POST['enrollment_date'];
            $this->enrollment->grade = $_POST['grade'];
            
            if ($this->enrollment->update()) {
                header("Location: index.php?action=enrollments");
                exit;
            } else {
                $students = $this->enrollment->getStudents();
                $courses = $this->enrollment->getCourses();
                include 'views/enrollments/edit.php';
            }
        }
    }

    // Delete an enrollment
    public function delete($id) {
        $this->enrollment->id = $id;
        if ($this->enrollment->delete()) {
            header("Location: index.php?action=enrollments");
            exit;
        }
    }
}
?>