
<?php
include '../includes/session.php';
if ($_SESSION['user_role'] != 'subadmin') {
    header('Location: ../index.php');
    exit();
}
?>
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
    padding: 0px;
    background-color: #f4f4f4;
}
.content h1 {
    color: black;}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo2.png"  type="image/x-icon"/>
    <title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="#">Insert New Post</a>
            <a href="#">View all Posts</a>
            <a href="#">View all Categories</a>
            <a href="#">View all Comments</a>
            <a href="logout.php">Admin Logout</a>
        </div>
        </div>
            <!-- Admin content here -->
        </div>
    </div>
</body>
</html>
