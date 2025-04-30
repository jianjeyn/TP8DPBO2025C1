<?php
/**
 * Homepage View
 */
include 'views/layouts/header.php';
?>

<div class="jumbotron">
    <h1 class="display-4"><i class="fas fa-university"></i> Student Management System</h1>
    <p class="lead">Welcome to your personal student management platform. Track students, courses, and enrollments with ease!</p>
    <hr class="my-4">
    <p>Use the navigation above to access different sections of the system, or choose one of the quick options below.</p>
    <div class="d-flex">
        <a class="btn btn-primary btn-lg mr-2" href="index.php?action=students" role="button">
            <i class="fas fa-user-graduate"></i> Manage Students
        </a>
        <a class="btn btn-success btn-lg" href="index.php?action=courses" role="button">
            <i class="fas fa-book"></i> Manage Courses
        </a>
    </div>
</div>

<div class="row mb-4">
    <!-- Dashboard Summary Cards -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body text-center">
                <i class="fas fa-user-graduate fa-3x mb-3"></i>
                <h5 class="card-title">Students</h5>
                <p class="card-text display-4"><?php echo $this->studentCount; ?></p>
                <a href="index.php?action=students" class="btn btn-light">
                    <i class="fas fa-arrow-right"></i> View Students
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body text-center">
                <i class="fas fa-book fa-3x mb-3"></i>
                <h5 class="card-title">Courses</h5>
                <p class="card-text display-4"><?php echo $this->courseCount; ?></p>
                <a href="index.php?action=courses" class="btn btn-light">
                    <i class="fas fa-arrow-right"></i> View Courses
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-info">
            <div class="card-body text-center">
                <i class="fas fa-clipboard-list fa-3x mb-3"></i>
                <h5 class="card-title">Enrollments</h5>
                <p class="card-text display-4"><?php echo $this->enrollmentCount; ?></p>
                <a href="index.php?action=enrollments" class="btn btn-light">
                    <i class="fas fa-arrow-right"></i> View Enrollments
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Students -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="m-0"><i class="fas fa-users"></i> Recent Students</h5>
                <a href="index.php?action=students" class="btn btn-sm btn-light">View All</a>
            </div>
            <div class="card-body">
                <?php if ($recentStudents->num_rows > 0): ?>
                <div class="list-group">
                    <?php while ($student = $recentStudents->fetch_assoc()): ?>
                    <a href="index.php?action=students&method=edit&id=<?php echo $student['id']; ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                <i class="fas fa-user-circle"></i> <?php echo $student['name']; ?>
                            </h5>
                            <small><i class="fas fa-id-card"></i> <?php echo $student['nim']; ?></small>
                        </div>
                        <p class="mb-1"><i class="fas fa-phone"></i> <?php echo $student['phone']; ?></p>
                        <small><i class="fas fa-calendar-alt"></i> Joined: <?php echo $student['join_date']; ?></small>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-user-plus fa-3x mb-3" style="color: var(--light-pink);"></i>
                    <p class="text-muted">No students have been added yet.</p>
                    <a href="index.php?action=students&method=create" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Add First Student
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Recent Courses -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h5 class="m-0"><i class="fas fa-book-open"></i> Recent Courses</h5>
                <a href="index.php?action=courses" class="btn btn-sm btn-light">View All</a>
            </div>
            <div class="card-body">
                <?php if ($recentCourses->num_rows > 0): ?>
                <div class="list-group">
                    <?php while ($course = $recentCourses->fetch_assoc()): ?>
                    <a href="index.php?action=courses&method=edit&id=<?php echo $course['id']; ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                <i class="fas fa-book"></i> <?php echo $course['course_name']; ?>
                            </h5>
                            <small><i class="fas fa-code"></i> <?php echo $course['course_code']; ?></small>
                        </div>
                        <p class="mb-1"><i class="fas fa-star"></i> Credits: <?php echo $course['credits']; ?></p>
                        <small><i class="fas fa-info-circle"></i> <?php echo substr($course['description'], 0, 100) . (strlen($course['description']) > 100 ? '...' : ''); ?></small>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-book-medical fa-3x mb-3" style="color: var(--light-pink);"></i>
                    <p class="text-muted">No courses have been added yet.</p>
                    <a href="index.php?action=courses&method=create" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add First Course
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>