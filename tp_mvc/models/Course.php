<?php
class Course {
    private $conn;
    private $table_name = "courses";

    // Course properties
    public $id;
    public $course_code;
    public $course_name;
    public $credits;
    public $description;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all courses
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    // Read one course
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->course_code = $row["course_code"];
            $this->course_name = $row["course_name"];
            $this->credits = $row["credits"];
            $this->description = $row["description"];
            return true;
        }
        return false;
    }

    // Create course
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (course_code, course_name, credits, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssis", $this->course_code, $this->course_name, $this->credits, $this->description);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update course
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET course_code = ?, course_name = ?, credits = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssisi", $this->course_code, $this->course_name, $this->credits, $this->description, $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete course
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}?>