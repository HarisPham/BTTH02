<?php
require_once'./models/News.php';
$newsItem = $newsEdit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center text-success mb-4">Edit News</h3>

    <!-- Form chỉnh sửa tin tức -->
    <form action="../../../index.php?controller=admin&action=edit&id=<?= $newsItem['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $newsItem['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required><?= $newsItem['content']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="dateCreated" class="form-label">Date Created</label>
            <input type="date" class="form-control" id="dateCreated" name="dateCreated" value="<?= $newsItem['created_at']; ?>">
        </div>
        <div class="mb-3">
            <label for="categoryId" class="form-label">Category ID</label>
            <input type="number" class="form-control" id="categoryId" name="categoryId" value="<?= $newsItem['category_id']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update News</button>
        <a href="/admin/dashboard.php" class="btn btn-danger">Cancel</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>