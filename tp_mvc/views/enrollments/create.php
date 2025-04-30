<?php
// views/enrollments/create.php
/**
 * Enrollments Create View
 */
include 'views/layouts/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="m-0">Create Enrollment</h3>
    </div>
    <div class="card-body">
        <form action="index.php?action=enrollments&method=store" method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    <?php while ($student = $students->fetch_assoc()): ?>
                    <option value="<?php echo $student['id']; ?>"><?php echo $student['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-control" id="course_id" name="course_id" required>
                    <option value="">Select Course</option>
                    <?php while ($course = $courses->fetch_assoc()): ?>
                    <option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="enrollment_date" class="form-label">Enrollment Date</label>
                <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" required>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-control" id="grade" name="grade">
                    <option value="">Not Graded Yet</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?action=enrollments" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>