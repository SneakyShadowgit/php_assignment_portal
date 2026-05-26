<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="main-content">
    <h2>📚 Available Assignments</h2>

    <div class="glass p-4 mt-4">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM assignments");

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['deadline']}</td>
                        <td>
                            <a href='upload.php?id={$row['id']}' class='btn btn-primary btn-sm'>
                                Upload
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