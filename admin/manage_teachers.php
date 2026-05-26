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
    <h2>👨‍🏫 Manage Teachers</h2>

    <div class="glass p-4 mt-4">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Username</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql = "
    SELECT 
        teachers.id AS teacher_id,
        teachers.name AS teacher_name,
        teachers.course,
        users.username
    FROM teachers
    JOIN users ON teachers.user_id = users.id
";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['teacher_id']}</td>
            <td>{$row['teacher_name']}</td>
            <td>{$row['username']}</td>
            <td>{$row['course']}</td>
            <td>
                <a href='delete_teacher.php?id={$row['teacher_id']}'
                   class='btn btn-danger btn-sm'
                   onclick=\"return confirm('Delete this teacher?');\">
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