<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once '../db/db.php';

// Fetch the course details based on the provided course ID
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    // Fetch course details from the database
    $stmt = $pdo->prepare("SELECT id, title, category, duration, price, start_date, end_date, status, image_url FROM courses WHERE id = ?");
    $stmt->execute([$course_id]);
    $course = $stmt->fetch();

    if (!$course) {
        die('Course not found');
    }
}

// Handle form submission (update course)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    // Handle image upload if a new image is provided
    $image_url = $course['image_url']; // Keep the existing image URL if no new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Ensure the uploads folder exists and is writable
        $upload_dir = '../uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
        }

        // Delete the old image if it's being replaced
        if ($image_url && file_exists('../' . $image_url)) {
            unlink('../' . $image_url);
        }

        // Move the new uploaded image to the uploads folder
        $image_url = 'uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image_url)) {
            // Image uploaded successfully
        } else {
            echo "Error uploading the file.";
        }
    }

    // Update course in the database
    $stmt = $pdo->prepare("UPDATE courses SET title = ?, category = ?, duration = ?, price = ?, start_date = ?, end_date = ?, status = ?, image_url = ? WHERE id = ?");
    $stmt->execute([$title, $category, $duration, $price, $start_date, $end_date, $status, $image_url, $course_id]);

    // Redirect with a success message
    header("Location: admin_courses.php?message=Course updated successfully!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Course</title>
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
        <h2>Edit Course</h2>

        <form action="edit_course.php?id=<?php echo $course['id']; ?>" method="POST" class="course-form" enctype="multipart/form-data">
            <label for="title">Course Title</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($course['title']); ?>" required>

            <label for="category">Category</label>
            <input type="text" name="category" id="category" value="<?php echo htmlspecialchars($course['category']); ?>" required>

            <label for="duration">Duration (hours)</label>
            <input type="number" name="duration" id="duration" value="<?php echo $course['duration']; ?>" required>

            <label for="price">Price ($)</label>
            <input type="number" name="price" id="price" step="0.01" value="<?php echo $course['price']; ?>" required>

            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="<?php echo $course['start_date']; ?>" required>

            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" value="<?php echo $course['end_date']; ?>">

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="Active" <?php echo $course['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
                <option value="Inactive" <?php echo $course['status'] === 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
            </select>

            <label for="image">Course Image</label>
            <input type="file" name="image" id="image">
            <p>Current Image: <?php echo $course['image_url'] ? '<img src="../' . $course['image_url'] . '" width="100">' : 'No image uploaded'; ?></p>

            <button type="submit" class="btn">Update Course</button>
        </form>
    </div>

</body>
</html>
