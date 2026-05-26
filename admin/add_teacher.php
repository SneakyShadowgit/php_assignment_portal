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
    <h2>👨‍🏫 Add Teacher</h2>

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
                <label class="form-label text-white">Course</label>
                <input type="text" name="course" class="form-control bg-dark text-white" required>
            </div>

            <button type="submit" name="add" class="btn btn-primary w-100">
                Add Teacher
            </button>
        </form>

        <?php
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $course = $_POST['course'];

    $sql1 = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'teacher')";
    if ($conn->query($sql1)) {
        $user_id = $conn->insert_id;
        $sql2 = "INSERT INTO teachers (user_id, name, course) VALUES ('$user_id', '$name', '$course')";
        $conn->query($sql2);
        echo "<div class='alert alert-success mt-3'>Teacher added successfully!</div>";
    }
    else {
        echo "<div class='alert alert-danger mt-3'>Error adding teacher!</div>";
    }
}
?>
    </div>
</div>

<?php include "../layout/footer.php"; ?>