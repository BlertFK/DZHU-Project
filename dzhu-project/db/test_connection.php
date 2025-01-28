<?php
// Include your database connection file
require './db.php';

try {
    // Test the connection
    $stmt = $pdo->query("SELECT 1");
    echo "Database connection is successful!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
