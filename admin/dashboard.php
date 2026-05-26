<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>Welcome Admin 👋</h2>
    <p>This is your dashboard.</p>

    <div class="row mt-4">
       <div class="col-md-4">
    <a href="manage_teachers.php" style="text-decoration:none; color:inherit;">
        <div class="glass p-3">
            <h5>Teachers</h5>
            <p>Manage teachers</p>
        </div>
    </a>
</div>
       <div class="col-md-4">
    <a href="manage_students.php" style="text-decoration:none; color:inherit;">
        <div class="glass p-3">
            <h5>Students</h5>
            <p>Manage Students</p>
        </div>
    </a>
</div>
        <div class="col-md-4">
    <a href="manage_assignments.php" style="text-decoration:none; color:inherit;">
        <div class="glass p-3">
            <h5>Assignments</h5>
            <p>Manage assignments</p>
        </div>
    </a>
</div>
    </div>
</div>

<?php include "../layout/footer.php"; ?>