<?php
$host = "sql209.byetcluster.com";
$user = "if0_42023731";
$password = "NBl1ke9MSyOxrx4";
$database = "if0_42023731_assignment";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>