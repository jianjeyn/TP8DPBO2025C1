<?php
// === MODELS ===
// models/Student.php
/**
 * Student Model
 */
class Student {
    private $conn;
    private $table_name = "students";

    // Student properties
    public $id;
    public $name;
    public $nim;
    public $phone;
    public $join_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all students
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    // Read one student
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->name = $row["name"];
            $this->nim = $row["nim"];
            $this->phone = $row["phone"];
            $this->join_date = $row["join_date"];
            return true;
        }
        return false;
    }

    // Create student
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, nim, phone, join_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $this->name, $this->nim, $this->phone, $this->join_date);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update student
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = ?, nim = ?, phone = ?, join_date = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $this->name, $this->nim, $this->phone, $this->join_date, $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete student
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