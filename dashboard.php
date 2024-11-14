<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit();
}

// Include the database connection file
include 'db.php';

$user_role = $_SESSION['user_role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            background-color: black;
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
            color: #ff6600;
        }
        .form-container {
            background-color: #ff6600;
            padding: 20px;
            border-radius: 5px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container form label {
            color: white;
            margin: 5px 0;
        }
        .form-container form input,
        .form-container form select,
        .form-container form textarea {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container form button {
            padding: 10px;
            background-color: white;
            color: #ff6600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container form button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="#">Insert New Post</a>
            <a href="#">View all Posts</a>
            <a href="#">View all Categories</a>
            <a href="#">View all Comments</a>
            <?php if ($user_role == 'admin'): ?>
                <a href="#">Manage Users</a>
            <?php endif; ?>
            <a href="logout.php">Admin Logout</a>
        </div>
        <div class="content">
            <h1>Insert New Post</h1>
            <div class="form-container">
                <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                    <!-- Implement the necessary CSRF token in actual implementation -->
                    <label for="title">Post Title:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="category">Post Category:</label>
                    <select id="category" name="category" required>
                        <option value="Posts">Posts</option>
                        <option value="News">News</option>
                        <option value="Sports">Sports</option>
                        <option value="Sci-Tech">Sci-Tech</option>
                        <option value="Opinion">Opinion</option>
                        <option value="Events">Events</option>
                        <!-- Add more categories as needed -->
                    </select>

                    <label for="author">Post Author:</label>
                    <input type="text" id="author" name="author" required>

                    <label for="keywords">Post Keywords:</label>
                    <input type="text" id="keywords" name="keywords" required>

                    <label for="image">Post Image:</label>
                    <input type="file" id="image" name="image">

                    <label for="content">Post Content:</label>
                    <textarea id="content" name="content" rows="10" required></textarea>

                    <button type="submit">Publish Post</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
