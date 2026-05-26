<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>📘 Add Course</h2>

    <div class="glass p-4 mt-4" style="max-width: 500px;">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-white">Course Code</label>
                <input type="text" name="course_code" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Course Name</label>
                <input type="text" name="course_name" class="form-control bg-dark text-white" required>
            </div>

            <button type="submit" name="add" class="btn btn-primary w-100">
                Add Course
            </button>
        </form>

        <?php
if (isset($_POST['add'])) {
    $code = $_POST['course_code'];
    $name = $_POST['course_name'];

    $sql = "INSERT INTO courses (course_code, course_name) VALUES ('$code', '$name')";
    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-3'>Course added successfully!</div>";
    }
    else {
        echo "<div class='alert alert-danger mt-3'>Error adding course!</div>";
    }
}
?>
    </div>
</div>

<?php include "../layout/footer.php"; ?>