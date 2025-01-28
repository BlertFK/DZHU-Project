<?php
require_once '../db/db.php'; // Ensure the path to db.php is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } else {
        // Fetch the user from the database using PDO
        try {
            $stmt = $pdo->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Start a session and store user info
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['username'];
                    $_SESSION['user_role'] = $user['role'];

                    // Redirect based on role
                    if ($user['role'] === 'admin') {
                        header("Location: ../admin/dashboard.php");
                    } else {
                        header("Location: ../user/dashboard.php");
                    }
                    exit;
                } else {
                    $error = "Incorrect password.";
                }
            } else {
                $error = "No account found with that email.";
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="./image/login-image.jpg" alt="Login Image" class="login-image">
        </div>
        <div class="form-section">
            <h2>Login</h2>
            <form method="POST" onsubmit="return validateLoginForm()">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>
