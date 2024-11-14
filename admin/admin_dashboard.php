<?php
include '../includes/session.php';
if ($_SESSION['user_role'] != 'admin') {
    header('Location: ../index.html');
    exit();
}
include 'db.php';

$user_role = $_SESSION['user_role'];

// Check for successful login message
$login_success = false;
if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
    $login_success = true;
    // Unset the session variable to avoid showing the message on page refresh
    unset($_SESSION['login_success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="images/logo2.png"  type="image/x-icon"/>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
        }
        .sidebar {
            background-color: #1e6d58;
            color: white;
            padding: 20px;
            width: 250px;
            min-height: 100vh;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .content h1 {
            color: black;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="insert_post.php">Insert New Post</a>
        <a href="#">View all Posts</a>
        <a href="#">View all Categories</a>
        <a href="#">View all Comments</a>
        <?php if ($user_role == 'admin'): ?>
            <a href="#">Manage Users</a>
        <?php endif; ?>
        <a href="logout.php">Admin Logout</a>
    </div>
    <div class="content">
        <?php if ($login_success): ?>
            <div class="success-message">
                Successful login!
            </div>
        <?php endif; ?>
        <h1>Welcome to the Admin Dashboard</h1>
        <!-- Dashboard content goes here -->
    </div>
</div>
</body>
</html>
