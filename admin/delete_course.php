<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once '../db/db.php'; // Include the PDO connection

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    // Delete the course from the database
    $stmt = $pdo->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->execute([$course_id]);

    // Redirect to courses management page with a success message
    header("Location: admin_courses.php?message=Course deleted successfully!");
    exit;
} else {
    // If no course ID is provided, redirect to courses page
    header("Location: admin_courses.php?error=Course ID missing.");
    exit;
}
?>
