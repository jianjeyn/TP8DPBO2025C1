<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/custom.css">
    <!-- JavaScript Libraries -->
    <script src="assets/jquery.min.js"></script>
    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-graduation-cap"></i> Student System
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (!isset($_GET['action']) || $_GET['action'] == 'home') ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home icon"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] == 'students') ? 'active' : ''; ?>" href="index.php?action=students">
                            <i class="fas fa-user-graduate icon"></i>Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] == 'courses') ? 'active' : ''; ?>" href="index.php?action=courses">
                            <i class="fas fa-book icon"></i>Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] == 'enrollments') ? 'active' : ''; ?>" href="index.php?action=enrollments">
                            <i class="fas fa-clipboard-list icon"></i>Enrollments
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4 fade-in">