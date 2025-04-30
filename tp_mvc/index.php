<?php
/**
 * Main Entry Point
 * This file acts as a front controller, routing all requests to the appropriate controller
 */

// Default action and method
$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Routing
switch ($action) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        break;
    case 'students':
        require_once 'controllers/StudentController.php';
        $controller = new StudentController();
        break;
    case 'courses':
        require_once 'controllers/CourseController.php';
        $controller = new CourseController();
        break;
    case 'enrollments':
        require_once 'controllers/EnrollmentController.php';
        $controller = new EnrollmentController();
        break;
    default:
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $method = 'index';
}

// Execute the requested method
switch ($method) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
}
?>