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
    <h2>🎓 Add Student</h2>

    <div class="glass p-4 mt-4" style="max-width: 500px;">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-white">Username</label>
                <input type="text" name="username" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Full Name</label>
                <input type="text" name="name" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Enrollment No</label>
                <input type="text" name="enrollment" class="form-control bg-dark text-white" required>
            </div>

            <button type="submit" name="add" class="btn btn-primary w-100">
                Add Student
            </button>
        </form>

        <?php
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $enrollment = $_POST['enrollment'];

    $sql1 = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'student')";
    if ($conn->query($sql1)) {
        $user_id = $conn->insert_id;
        $sql2 = "INSERT INTO students (user_id, name, enrollment_no) VALUES ('$user_id', '$name', '$enrollment')";
        $conn->query($sql2);
        echo "<div class='alert alert-success mt-3'>Student added successfully!</div>";
    }
    else {
        echo "<div class='alert alert-danger mt-3'>Error adding student!</div>";
    }
}
?>
    </div>
</div>

<?php include "../layout/footer.php"; ?>