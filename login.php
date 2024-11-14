<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = $conn->real_escape_string($username);

    $sql = "SELECT id, password, role FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password, $user_role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['login_success'] = true;

            if ($user_role == 'admin') {
                header('Location: admin/admin_dashboard.php');
            } elseif ($user_role == 'subadmin') {
                header('Location: admin/subadmin_dashboard.php');
            } else {
                $_SESSION['error'] = "Invalid user role.";
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "Invalid username.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo2.png" type="image/x-icon"/>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('images/background.png');
            background-color: #e0e0e0;
            margin: 0;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 420px;
            width: 100%;
        }
        .login-container img {
            width: 150px;
        }
        .login-container h2 {
            margin: 20px 0;
            font-size: 24px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="checkbox"] {
            margin: 20px 0;
        }
        .login-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #004d40;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
        .register-link {
            color: #004d40;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="images/logo.png" alt="University Scribe Logo">
        <h2>Admin Login</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="checkbox" name="remember"> Remember me
            <button type="submit">Login</button>
        </form>
        <p>Don’t have an account? <a href="register.php" class="register-link">Register here</a></p>
    </div>
</body>
</html>
