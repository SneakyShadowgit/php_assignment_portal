<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assignment Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assignment_portal/assets/css/style.css">
</head>
<body>

<div class="glass navbar-glass d-flex justify-content-between align-items-center">
    <h4 class="text-white mb-0">📚 Assignment Portal</h4>
    <div class="text-white">
        <i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?>
        <a href="/assignment_portal/logout.php" class="btn btn-sm btn-danger ms-3">Logout</a>
    </div>
</div>




