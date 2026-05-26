<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get real student id
$getStudent = $conn->query("SELECT id FROM students WHERE user_id = '$user_id'");
$row = $getStudent->fetch_assoc();
$student_id = $row['id'];

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>⭐ My Grades</h2>

    <div class="glass p-4 mt-4">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>Submission ID</th>
                    <th>Marks</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT g.* FROM grades g
                    JOIN submissions s ON g.submission_id = s.id
                    WHERE s.student_id = '$student_id'";

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['submission_id']}</td>
                        <td><span class='badge bg-success'>{$row['marks']}</span></td>
                        <td>{$row['feedback']}</td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../layout/footer.php"; ?>