<?php
// views/students/create.php
/**
 * Students Create View
 */
include 'views/layouts/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="m-0">Create Student</h3>
    </div>
    <div class="card-body">
        <form action="index.php?action=students&method=store" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date</label>
                <input type="date" class="form-control" id="join_date" name="join_date" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?action=students" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>