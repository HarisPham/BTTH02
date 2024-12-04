<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Quản lý danh mục</h1>
    <!-- Nút thêm danh mục -->
    <a href="add.php" class="btn btn-primary mb-3">Thêm danh mục</a>

    <!-- Bảng danh sách danh mục -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th>Thể loại</th>
            <th>Nội dung</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Thể loại 1</td>
            <td>Nội dung mẫu 1</td>
            <td><img src="image1.jpg" alt="Hình ảnh 1" width="100"></td>
            <td>
                <a href="edit.php?id=1" class="btn btn-warning btn-sm">Sửa</a>
                <a href="delete.php?id=1" class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Thể loại 2</td>
            <td>Nội dung mẫu 2</td>
            <td><img src="image2.jpg" alt="Hình ảnh 2" width="100"></td>
            <td>
                <a href="edit.php?id=2" class="btn btn-warning btn-sm">Sửa</a>
                <a href="delete.php?id=2" class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
        <!-- Thêm nhiều hàng dữ liệu mẫu tại đây -->
        </tbody>
    </table>
</div>
</body>
</html>
