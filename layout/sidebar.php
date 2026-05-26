<div class="glass sidebar">
    <h5 class="text-white mb-4">Dashboard</h5>

    <?php if ($_SESSION['role'] == 'admin') { ?>
        <a href="/assignment_portal/admin/dashboard.php"><i class="fa fa-home"></i> Home</a>
        <a href="/assignment_portal/admin/add_teacher.php"><i class="fa fa-user-plus"></i> Add Teacher</a>
        <a href="/assignment_portal/admin/add_student.php"><i class="fa fa-user-graduate"></i> Add Student</a>
        <a href="/assignment_portal/admin/add_course.php"><i class="fa fa-book"></i> Add Course</a>
        <a href="/assignment_portal/admin/add_assignment.php"><i class="fa fa-tasks"></i> Create Assignment</a>
    <?php
}?>

    <?php if ($_SESSION['role'] == 'student') { ?>
        <a href="/assignment_portal/student/dashboard.php"><i class="fa fa-home"></i> Home</a>
        <a href="/assignment_portal/student/view_assignments.php"><i class="fa fa-list"></i> Assignments</a>
        <a href="/assignment_portal/student/view_grades.php"><i class="fa fa-star"></i> Grades</a>
    <?php
}?>

    <?php if ($_SESSION['role'] == 'teacher') { ?>
    <a href="/assignment_portal/teacher/dashboard.php"><i class="fa fa-home"></i> Home</a>
    <a href="/assignment_portal/teacher/view_uploads.php"><i class="fa fa-file"></i> Submissions</a>
    <a href="/assignment_portal/teacher/add_assignment.php"><i class="fa fa-plus"></i> Create Assignment</a>
<?php
}?>
</div>




