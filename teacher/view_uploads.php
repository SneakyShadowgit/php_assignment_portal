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
    <h2>📂 Student Submissions</h2>

    <div class="glass p-4 mt-4">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Assignment ID</th>
                    <th>File</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$result = $conn->query("
    SELECT submissions.*, students.name AS student_name
    FROM submissions
    JOIN students ON submissions.student_id = students.id
");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['assignment_id']}</td>
                        <td>
                            <a href='../uploads/{$row['file_name']}' target='_blank' class='btn btn-outline-info btn-sm'>
                                View
                            </a>
                        </td>
                        <td>{$row['submitted_at']}</td>
                        <td>
                            <a href='grade.php?id={$row['id']}' class='btn btn-success btn-sm'>
                                Grade
                            </a>
                        </td>
                      </tr>";
}
?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../layout/footer.php"; ?>