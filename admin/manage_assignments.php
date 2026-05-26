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
    <h2>📝 Manage Assignments</h2>

    <div class="glass p-4 mt-4">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Assignment ID</th>
                    <th>Title</th>
                    <th>Course</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$sql = "
                SELECT 
                    assignments.id,
                    assignments.title,
                    assignments.deadline,
                    courses.course_name
                FROM assignments
                JOIN courses ON assignments.course_id = courses.id
            ";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['course_name']}</td>
                        <td>{$row['deadline']}</td>
                        <td>
                            <a href='delete_assignment.php?id={$row['id']}'
                               class='btn btn-danger btn-sm'
                               onclick=\"return confirm('Delete this assignment?');\">
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