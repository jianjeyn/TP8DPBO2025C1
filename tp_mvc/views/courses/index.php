<?php
// views/courses/index.php
/**
 * Courses Index View
 */
include 'views/layouts/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Courses</h2>
    <a href="index.php?action=courses&method=create" class="btn btn-primary">Add New Course</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Credits</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['course_code']; ?></td>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['credits']; ?></td>
            <td><?php echo substr($row['description'], 0, 50) . (strlen($row['description']) > 50 ? '...' : ''); ?></td>
            <td>
                <a href="index.php?action=courses&method=edit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="index.php?action=courses&method=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        <?php if ($result->num_rows === 0): ?>
        <tr>
            <td colspan="6" class="text-center">No courses found</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>