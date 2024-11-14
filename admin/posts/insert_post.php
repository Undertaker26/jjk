<?php
include '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Post</title>
<link rel="stylesheet" href="insert.css"></head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="insert_post.php">Insert New Post</a>
            <a href="#">View all Posts</a>
            <a href="#">View all Categories</a>
            <a href="#">View all Comments</a>
            <a href="../logout.php">Admin Logout</a>
        </div>
    
                 <div class="content">
            <div class="form-container">
                <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            
                    <label for="title">Post Title:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="category">Post Category:</label>
                    <select id="category" name="category" required>
                        <option value="Posts">Posts</option>
                        <option value="News">News</option>
                        <option value="Sports">Sports</option>
                        <option value="Sci-Tech">Sci-Tech</option>
                        <option value="Cartoonist">Cartoonist</option>
                        <option value="Opinion">Opinion</option>
                        <option value="Events">Events</option>
                        <option value="Videos">Videos</option>
                        <option value="Album">Album</option>
                        <option value="Live">Live</option>
                        <option value="About">About</option>
                        <!-- Add more categories as needed -->
                    </select>

                    

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
            </div>
        </div>
    </div>
</body>
</html>
