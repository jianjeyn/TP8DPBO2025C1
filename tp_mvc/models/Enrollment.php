<?php
class Enrollment {
    private $conn;
    private $table_name = "enrollments";

    // Enrollment properties
    public $id;
    public $student_id;
    public $course_id;
    public $enrollment_date;
    public $grade;

    // Related properties
    public $student_name;
    public $course_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all enrollments with related student and course information
    public function readAll() {
        $query = "SELECT e.id, e.student_id, e.course_id, e.enrollment_date, e.grade, 
                         s.name as student_name, c.course_name 
                  FROM " . $this->table_name . " e
                  LEFT JOIN students s ON e.student_id = s.id
                  LEFT JOIN courses c ON e.course_id = c.id";
        $result = $this->conn->query($query);
        return $result;
    }

    // Read one enrollment
    public function readOne() {
        $query = "SELECT e.id, e.student_id, e.course_id, e.enrollment_date, e.grade, 
                         s.name as student_name, c.course_name 
                  FROM " . $this->table_name . " e
                  LEFT JOIN students s ON e.student_id = s.id
                  LEFT JOIN courses c ON e.course_id = c.id
                  WHERE e.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->student_id = $row["student_id"];
            $this->course_id = $row["course_id"];
            $this->enrollment_date = $row["enrollment_date"];
            $this->grade = $row["grade"];
            $this->student_name = $row["student_name"];
            $this->course_name = $row["course_name"];
            return true;
        }
        return false;
    }

    // Create enrollment
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (student_id, course_id, enrollment_date, grade) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiss", $this->student_id, $this->course_id, $this->enrollment_date, $this->grade);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update enrollment
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET student_id = ?, course_id = ?, enrollment_date = ?, grade = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iissi", $this->student_id, $this->course_id, $this->enrollment_date, $this->grade, $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete enrollment
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get all students
    public function getStudents() {
        $query = "SELECT id, name FROM students";
        $result = $this->conn->query($query);
        return $result;
    }

    // Get all courses
    public function getCourses() {
        $query = "SELECT id, course_name FROM courses";
        $result = $this->conn->query($query);
        return $result;
    }
}?>