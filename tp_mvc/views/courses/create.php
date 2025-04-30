<?php
// views/courses/create.php
/**
 * Courses Create View
 */
include 'views/layouts/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="m-0">Create Course</h3>
    </div>
    <div class="card-body">
        <form action="index.php?action=courses&method=store" method="post">
            <div class="mb-3">
                <label for="course_code" class="form-label">Course Code</label>
                <input type="text" class="form-control" id="course_code" name="course_code" required>
            </div>
            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>
            <div class="mb-3">
                <label for="credits" class="form-label">Credits</label>
                <input type="number" class="form-control" id="credits" name="credits" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?action=courses" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>