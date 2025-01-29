<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once '../db/db.php';

// Fetch courses from the database
$stmt = $pdo->prepare("SELECT id, title, category, duration, price, start_date, end_date, status, image_url FROM courses ORDER BY created_at DESC");
$stmt->execute();
$courses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Courses</title>
    <link rel="stylesheet" href="style_course.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_course.php">Add New Course</a></li>
            <li><a href="admin_courses.php">Manage Courses</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Manage Courses</h2>

        <?php if (isset($_GET['message'])) { ?>
            <div class="message success">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php } ?>

        <table class="course-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Duration (hrs)</th>
                    <th>Price</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($course['title']); ?></td>
                        <td><?php echo htmlspecialchars($course['category']); ?></td>
                        <td><?php echo $course['duration']; ?></td>
                        <td>$<?php echo number_format($course['price'], 2); ?></td>
                        <td><?php echo $course['start_date']; ?></td>
                        <td><?php echo $course['end_date'] ?: 'Not Set'; ?></td>
                        <td><?php echo $course['status']; ?></td>
                        <td>
                            <?php if ($course['image_url']) { ?>
                                <img src="../<?php echo htmlspecialchars($course['image_url']); ?>" alt="Course Image" width="100" height="100">
                            <?php } else { ?>
                                <span>No image</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="edit_course.php?id=<?php echo $course['id']; ?>" class="btn">Edit</a>
                            <a href="delete_course.php?id=<?php echo $course['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
