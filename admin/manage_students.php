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
    <h2>🎓 Manage Students</h2>

    <div class="glass p-4 mt-4">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Username</th>
                    <th>Enrollment No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$sql = "
                SELECT 
                    students.id AS student_id,
                    students.name AS student_name,
                    students.enrollment_no,
                    users.username
                FROM students
                JOIN users ON students.user_id = users.id
            ";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['enrollment_no']}</td>
                        <td>
                            <a href='delete_student.php?id={$row['student_id']}'
                               class='btn btn-danger btn-sm'
                               onclick=\"return confirm('Delete this student?');\">
                               Delete
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