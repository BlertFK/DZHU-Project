<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ./login/login.php");
    exit;
}

$username = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>KnowHive</h2>
        <ul>
            <li><a href="../../admin/dashboard.php">Dashboard</a></li>
            <li><a href="#">Manage Courses</a></li>
            <li><a href="#">View Users</a></li>
        </ul>
    </div>

    <div class="dashboard-content">
        <div class="dashboard-header">
            <h2>Welcome, Admin <?php echo htmlspecialchars($username); ?>!</h2>
            <button class="logout-btn"><a href="../login/logout.php">Logout</a></button>
        </div>
        <div class="dashboard-body">
            <h3>Admin Dashboard</h3>
            <p>Manage users, courses, and other settings.</p>
            <!-- Add admin-specific content here -->
        </div>
    </div>
</body>
</html>
