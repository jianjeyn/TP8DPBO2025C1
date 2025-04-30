<?php
class StudentController {
    private $db;
    private $student;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Student.php';
        
        $database = new Database();
        $db = $database->getConnection();
        
        $this->student = new Student($db);
    }

    // Show all students
    public function index() {
        $result = $this->student->readAll();
        include 'views/students/index.php';
    }

    // Show create form
    public function create() {
        include 'views/students/create.php';
    }

    // Process form submission to store new student
    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->student->name = $_POST['name'];
            $this->student->nim = $_POST['nim'];
            $this->student->phone = $_POST['phone'];
            $this->student->join_date = $_POST['join_date'];
            
            if ($this->student->create()) {
                header("Location: index.php?action=students");
                exit;
            } else {
                include 'views/students/create.php';
            }
        }
    }

    // Show edit form
    public function edit($id) {
        $this->student->id = $id;
        if ($this->student->readOne()) {
            include 'views/students/edit.php';
        } else {
            header("Location: index.php?action=students");
            exit;
        }
    }

    // Process form submission to update student
    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->student->id = $_POST['id'];
            $this->student->name = $_POST['name'];
            $this->student->nim = $_POST['nim'];
            $this->student->phone = $_POST['phone'];
            $this->student->join_date = $_POST['join_date'];
            
            if ($this->student->update()) {
                header("Location: index.php?action=students");
                exit;
            } else {
                include 'views/students/edit.php';
            }
        }
    }

    // Delete a student
    public function delete($id) {
        $this->student->id = $id;
        if ($this->student->delete()) {
            header("Location: index.php?action=students");
            exit;
        }
    }
}
?>