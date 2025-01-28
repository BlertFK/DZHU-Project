<?php
$host = 'localhost';
$dbname = 'dzhu';
$user = 'root'; // Default XAMPP user
$pass = '';     // No password by default for XAMPP

try {
    // Create a new PDO instance
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // Added charset for better compatibility
    $pdo = new PDO($dsn, $user, $pass);

    // Set PDO attributes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error mode to exception
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable emulated prepared statements for security

    // Connection successful (Optional debug message, remove in production)
    // echo "Database connection successful!";
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
