<?php
session_start();
include("db_connect.php"); // Ensure this connects to the database

// Fetch blogs with author names from the 'registration' table
$sql = "SELECT b.blog_id, b.blog_title, b.blog, b.blog_img, b.blog_date, r.name AS author
        FROM blog b
        JOIN registration r ON b.blogger_id = r.reg_id
        ORDER BY b.blog_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .blog-container {
            width: 60%;
            margin: 0 auto;
        }
        .blog-post {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .blog-title {
            font-size: 24px;
            font-weight: bold;
        }
        .blog-author {
            font-style: italic;
            color: #666;
        }
        .blog-content {
            margin: 15px 0;
        }
        .blog-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <h1>All Blogs</h1>
        
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="blog-post">
                <div class="blog-title"><?php echo htmlspecialchars($row['blog_title']); ?></div>
                <p class="blog-author">Author: <?php echo htmlspecialchars($row['author']); ?></p>
                <p class="blog-content"><?php echo htmlspecialchars($row['blog']); ?></p>
                <p>Posted on: <?php echo htmlspecialchars($row['blog_date']); ?></p>
                
                <!-- Display the blog image if available -->
                <?php if (!empty($row['blog_img']) && file_exists($row['blog_img'])): ?>
                    <img src="<?php echo htmlspecialchars($row['blog_img']); ?>" alt="Blog Image" class="blog-image">
                <?php else: ?>
                    <p><em>No image available</em></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
