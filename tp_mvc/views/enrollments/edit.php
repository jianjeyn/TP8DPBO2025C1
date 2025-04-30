<?php
// views/enrollments/edit.php
/**
 * Enrollments Edit View
 */
include 'views/layouts/header.php';
?>

<div class="card">
    <div class="card-header bg-warning">
        <h3 class="m-0">Edit Enrollment</h3>
    </div>
    <div class="card-body">
        <form action="index.php?action=enrollments&method=update" method="post">
            <input type="hidden" name="id" value="<?php echo $this->enrollment->id; ?>">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    <?php while ($student = $students->fetch_assoc()): ?>
                    <option value="<?php echo $student['id']; ?>" <?php echo ($student['id'] == $this->enrollment->student_id) ? 'selected' : ''; ?>>
                        <?php echo $student['name']; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-control" id="course_id" name="course_id" required>
                    <option value="">Select Course</option>
                    <?php while ($course = $courses->fetch_assoc()): ?>
                    <option value="<?php echo $course['id']; ?>" <?php echo ($course['id'] == $this->enrollment->course_id) ? 'selected' : ''; ?>>
                        <?php echo $course['course_name']; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="enrollment_date" class="form-label">Enrollment Date</label>
                <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" value="<?php echo $this->enrollment->enrollment_date; ?>" required>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-control" id="grade" name="grade">
                    <option value="" <?php echo (empty($this->enrollment->grade)) ? 'selected' : ''; ?>>Not Graded Yet</option>
                    <option value="A" <?php echo ($this->enrollment->grade == 'A') ? 'selected' : ''; ?>>A</option>
                    <option value="B" <?php echo ($this->enrollment->grade == 'B') ? 'selected' : ''; ?>>B</option>
                    <option value="C" <?php echo ($this->enrollment->grade == 'C') ? 'selected' : ''; ?>>C</option>
                    <option value="D" <?php echo ($this->enrollment->grade == 'D') ? 'selected' : ''; ?>>D</option>
                    <option value="E" <?php echo ($this->enrollment->grade == 'E') ? 'selected' : ''; ?>>E</option>
                    <option value="F" <?php echo ($this->enrollment->grade == 'F') ? 'selected' : ''; ?>>F</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?action=enrollments" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>