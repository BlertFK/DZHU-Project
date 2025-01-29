<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once '../db/db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    // Get the current logged-in user's ID
    $created_by = $_SESSION['user_id']; // Use the user_id from the session

    // Handle image upload if any
    $image_url = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Ensure the uploads folder exists and is writable
        $upload_dir = '../uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
        }

        $image_url = 'uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image_url)) {
            // Successfully moved the file
        } else {
            echo "Error uploading the file.";
        }
    }

    // Insert new course into the database
    $stmt = $pdo->prepare("INSERT INTO courses (title, category, duration, price, start_date, end_date, status, image_url, created_by) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $category, $duration, $price, $start_date, $end_date, $status, $image_url, $created_by]);

    // Redirect with a success message
    header("Location: admin_courses.php?message=Course added successfully!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add New Course</title>
    <link rel="stylesheet" href="style_course.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_course.php" class="active">Add New Course</a></li>
            <li><a href="admin_courses.php">Manage Courses</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Add New Course</h2>

        <form action="add_course.php" method="POST" class="course-form" enctype="multipart/form-data">
            <label for="title">Course Title</label>
            <input type="text" name="title" id="title" required>

            <label for="category">Category</label>
            <input type="text" name="category" id="category" required>

            <label for="duration">Duration (hours)</label>
            <input type="number" name="duration" id="duration" required>

            <label for="price">Price ($)</label>
            <input type="number" name="price" id="price" step="0.01" required>

            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" required>

            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date">

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>

            <label for="image">Course Image</label>
            <input type="file" name="image" id="image">

            <button type="submit" class="btn">Add Course</button>
        </form>
    </div>

</body>
</html>
