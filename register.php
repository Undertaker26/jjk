<?php
include 'includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // This could be 'admin' or 'subadmin'

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $hashed_password, $role);

    if ($stmt->execute()) {
        $message = "Registration successful.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="icon" href="images/logo2.png"  type="image/x-icon"/>
    <title>Register</title>
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
        .login-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        .message {
            margin: 10px 0;
            color: green;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="images/logo.png" alt="University Scribe Logo">
        <h2>Register</h2>
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="subadmin">Subadmin</option>
            </select>
            <br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a class="register-link" href='login.php'>Login</a></p>
    </div>
</body>
</html>
