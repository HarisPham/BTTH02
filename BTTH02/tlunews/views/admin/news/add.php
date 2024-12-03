<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Tin tức</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
<h1 class="mt-4">Thêm Tin tức</h1>
<form method="POST" action="/BTTH02/tlunews/admin/news/add" class="mt-3">
    <div class="mb-3">
        <label for="title" class="form-label">Tiêu đề:</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Nội dung:</label>
        <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Đường dẫn ảnh:</label>
        <input type="text" id="image" name="image" class="form-control">
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">ID Danh mục:</label>
        <input type="number" id="category_id" name="category_id" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Thêm</button>
    <a href="/BTTH02/tlunews/admin/news" class="btn btn-secondary">Quay lại</a>
</form>
</body>
</html>
