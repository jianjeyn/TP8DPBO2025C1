<?php
// views/enrollments/index.php
/**
 * Enrollments Index View
 */
include 'views/layouts/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Enrollments</h2>
    <a href="index.php?action=enrollments&method=create" class="btn btn-primary">Add New Enrollment</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Course</th>
            <th>Enrollment Date</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['student_name']; ?></td>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['enrollment_date']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            <td>
                <a href="index.php?action=enrollments&method=edit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="index.php?action=enrollments&method=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        <?php if ($result->num_rows === 0): ?>
        <tr>
            <td colspan="6" class="text-center">No enrollments found</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>