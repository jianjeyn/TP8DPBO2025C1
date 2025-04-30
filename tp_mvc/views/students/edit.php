<?php
// views/students/edit.php
/**
 * Students Edit View
 */
include 'views/layouts/header.php';
?>

<div class="card">
    <div class="card-header bg-warning">
        <h3 class="m-0">Edit Student</h3>
    </div>
    <div class="card-body">
        <form action="index.php?action=students&method=update" method="post">
            <input type="hidden" name="id" value="<?php echo $this->student->id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->student->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $this->student->nim; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $this->student->phone; ?>" required>
            </div>
            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="<?php echo $this->student->join_date; ?>" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?action=students" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>