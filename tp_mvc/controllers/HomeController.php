<?php
// controllers/HomeController.php
/**
 * Home Controller
 * Handles the homepage functionality
 */
class HomeController {
    private $db;
    private $studentCount;
    private $courseCount;
    private $enrollmentCount;

    public function __construct() {
        require_once 'config/database.php';
        
        $database = new Database();
        $this->db = $database->getConnection();
        
        // Get dashboard statistics
        $this->getDashboardStats();
    }

    // Show homepage
    public function index() {
        // Recent students
        $recentStudents = $this->getRecentStudents();
        
        // Recent courses
        $recentCourses = $this->getRecentCourses();
        
        // Pass data to view
        include 'views/home/index.php';
    }
    
    // Get counts for dashboard
    private function getDashboardStats() {
        // Get student count
        $query = "SELECT COUNT(*) as count FROM students";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        $this->studentCount = $row['count'];
        
        // Get course count
        $query = "SELECT COUNT(*) as count FROM courses";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        $this->courseCount = $row['count'];
        
        // Get enrollment count
        $query = "SELECT COUNT(*) as count FROM enrollments";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        $this->enrollmentCount = $row['count'];
    }
    
    // Get recent students
    private function getRecentStudents() {
        $query = "SELECT * FROM students ORDER BY id DESC LIMIT 5";
        $result = $this->db->query($query);
        return $result;
    }
    
    // Get recent courses
    private function getRecentCourses() {
        $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 5";
        $result = $this->db->query($query);
        return $result;
    }
}

