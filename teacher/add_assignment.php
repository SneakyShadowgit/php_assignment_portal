<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../login.php");
    exit();
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>📝 Create Assignment</h2>

    <div class="glass p-4 mt-4" style="max-width: 600px;">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-white">Title</label>
                <input type="text" name="title" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Description</label>
                <textarea name="description" class="form-control bg-dark text-white" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Deadline</label>
                <input type="date" name="deadline" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Select Course</label>
                <select name="course_id" class="form-control bg-dark text-white" required>
                    <option value="">Choose Course</option>
                    <?php
$result = $conn->query("SELECT * FROM courses");
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['id']}'>{$row['course_name']}</option>";
}
?>
                </select>
            </div>

            <button type="submit" name="add" class="btn btn-primary w-100">
                Create Assignment
            </button>
        </form>

        <?php
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $deadline = $_POST['deadline'];
    $course_id = $_POST['course_id'];
    $teacher_user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO assignments 
(course_id, title, description, deadline, teacher_id)
VALUES 
('$course_id', '$title', '$desc', '$deadline', '$teacher_user_id')";

    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-3'>Assignment created successfully!</div>";
    }
    else {
        echo "<div class='alert alert-danger mt-3'>Error creating assignment!</div>";
    }
}
?>
    </div>
</div>

<?php include "../layout/footer.php"; ?>