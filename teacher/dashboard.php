<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../login.php");
    exit();
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>Welcome Teacher 👋</h2>
    <p>Review and grade student submissions.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="glass p-4">
                <h5><i class="fa fa-file"></i> Student Submissions</h5>
                <p>View uploaded files</p>
                <a href="view_uploads.php" class="btn btn-primary btn-sm">Open</a>
            </div>
        </div>
    </div>
</div>

<?php include "../layout/footer.php"; ?>