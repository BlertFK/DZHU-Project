<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

$username = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../admin/styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>KnowHive</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">View Courses</a></li>
            <li><a href="#">Enrolled Courses</a></li>
        </ul>
    </div>

    <div class="dashboard-content">
        <div class="dashboard-header">
            <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
            <button class="logout-btn"><a href="../login/logout.php">Logout</a></button>
        </div>
        <div class="dashboard-body">
            <h3>Your Dashboard</h3>
            <p>View your courses, enrollments, and more.</p>
            <!-- Add content specific to the user here -->
        </div>
    </div>

</body>
</html>
