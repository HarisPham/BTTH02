<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Chào mừng đến trang Quản trị!</h1>
    <p>Xin chào, Quản trị viên!</p>
    <p>Đây là giao diện quản trị, bạn có thể quản lý các mục như bài viết, danh mục, và người dùng.</p>
    <div class="row">
        <div class="col-md-4">
            <a href="/BTTH02/tlunews/admin/articles" class="btn btn-primary w-100 mb-3">Quản lý bài viết</a>
        </div>
        <div class="col-md-4">
            <a href="/BTTH02/tlunews/admin/categories" class="btn btn-secondary w-100 mb-3">Quản lý danh mục</a>
        </div>
        <div class="col-md-4">
            <a href="/BTTH02/tlunews/admin/users" class="btn btn-success w-100 mb-3">Quản lý người dùng</a>
        </div>
    </div>
    <a href="/BTTH02/tlunews/admin/logout" class="btn btn-danger mt-3">Đăng xuất</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
