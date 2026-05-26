<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>Welcome Student 👋</h2>
    <p>Track your assignments & grades here.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="glass p-4">
                <h5><i class="fa fa-list"></i> Assignments</h5>
                <p>View and submit assignments</p>
                <a href="view_assignments.php" class="btn btn-primary btn-sm">Open</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="glass p-4">
                <h5><i class="fa fa-star"></i> Grades</h5>
                <p>Check your grades</p>
                <a href="view_grades.php" class="btn btn-primary btn-sm">Open</a>
            </div>
        </div>
    </div>
</div>

<?php include "../layout/footer.php"; ?>