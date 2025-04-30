<?php
// views/students/index.php
/**
 * Students Index View
 */
include 'views/layouts/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Students</h2>
    <a href="index.php?action=students&method=create" class="btn btn-primary">Add New Student</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>NIM</th>
            <th>Phone</th>
            <th>Join Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['join_date']; ?></td>
            <td>
                <a href="index.php?action=students&method=edit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="index.php?action=students&method=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>