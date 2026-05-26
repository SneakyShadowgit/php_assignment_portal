<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['user_id'];
?>

<h2>My Grades</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Submission ID</th>
    <th>Marks</th>
    <th>Feedback</th>
</tr>

<?php
$sql = "SELECT g.* FROM grades g
        JOIN submissions s ON g.submission_id = s.id
        WHERE s.student_id = '$student_id'";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['submission_id']}</td>
            <td>{$row['marks']}</td>
            <td>{$row['feedback']}</td>
          </tr>";
}
?>
</table>

<a href="dashboard.php">Back</a>