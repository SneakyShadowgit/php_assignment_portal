<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>📝 Grade Submission</h2>

    <div class="glass p-4 mt-4" style="max-width: 500px;">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-white">Marks</label>
                <input type="number" name="marks" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Feedback</label>
                <textarea name="feedback" class="form-control bg-dark text-white" rows="4"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-success w-100">
                Submit Grade
            </button>
        </form>

        <?php
if (isset($_POST['submit'])) {
    $marks = $_POST['marks'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO grades (submission_id, marks, feedback)
                    VALUES ('$id', '$marks', '$feedback')";

    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-3'>Grade submitted successfully!</div>";
    }
    else {
        echo "<div class='alert alert-danger mt-3'>Error submitting grade!</div>";
    }
}
?>
    </div>
</div>

<?php include "../layout/footer.php"; ?>