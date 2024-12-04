<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Tin tức</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
<h1 class="mt-4">Sửa Tin tức</h1>
<form method="POST" action="/BTTH02/tlunews/admin/news/edit/<?php echo $newsItem['id']; ?>" class="mt-3">
    <div class="mb-3">
        <label for="title" class="form-label">Tiêu đề:</label>
        <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($newsItem['title']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Nội dung:</label>
        <textarea id="content" name="content" class="form-control" rows="5" required><?php echo htmlspecialchars($newsItem['content']); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Đường dẫn ảnh:</label>
        <input type="text" id="image" name="image" class="form-control" value="<?php echo htmlspecialchars($newsItem['image']); ?>">
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">ID Danh mục:</label>
        <input type="number" id="category_id" name="category_id" class="form-control" value="<?php echo $newsItem['category_id']; ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Cập nhật</button>
    <a href="/BTTH02/tlunews/admin/news" class="btn btn-secondary">Quay lại</a>
</form>
</body>
</html>
