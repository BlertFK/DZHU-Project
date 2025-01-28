<?php
require_once '../db/db.php'; // Make sure this path points to your db.php file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']); // Change name to username
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Server-side validation
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[A-Z]).{6,}$/', $password)) {
        $error = "Password must include one uppercase letter, one number, one symbol, and be at least 6 characters.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database (Using PDO)
        try {
            // Using the $pdo connection from db.php
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            header("Location: login.php?message=Registration successful! Please log in.");
            exit;
        } catch (PDOException $e) {
            $error = "Error: Could not register. This email may already be in use. " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="./image/login-image.jpg" alt="Login Image" class="login-image">
        </div>
        <div class="form-section">
            <h2>Register</h2>
            <form method="POST" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="username">Username:</label> <!-- Changed to username -->
                    <input type="text" id="username" name="username" required> <!-- Changed to username -->
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit">Register</button>
            </form>
            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>
