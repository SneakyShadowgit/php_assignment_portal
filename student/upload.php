<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

$assignment_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Get real student id
$getStudent = $conn->query("SELECT id FROM students WHERE user_id = '$user_id'");
$row = $getStudent->fetch_assoc();
$student_id = $row['id'];

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>📤 Upload Assignment</h2>

    <div class="glass p-4 mt-4" style="max-width: 500px;">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-white">Choose File</label>
                <input type="file" name="file" class="form-control bg-dark text-white" required>
            </div>

            <button type="submit" name="upload" class="btn btn-primary w-100">
                Upload
            </button>
        </form>

        <?php
        if (isset($_POST['upload'])) {
            $file_name = time() . "_" . $_FILES['file']['name'];
            $target = "../uploads/" . $file_name;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                $sql = "INSERT INTO submissions (assignment_id, student_id, file_name)
                        VALUES ('$assignment_id', '$student_id', '$file_name')";

                if ($conn->query($sql)) {
                    echo "<div class='alert alert-success mt-3'>File uploaded successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Database error!</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3'>File upload failed!</div>";
            }
        }
        ?>
    </div>
</div>

<?php include "../layout/footer.php"; ?>