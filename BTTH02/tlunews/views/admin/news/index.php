


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Quản lý Tin tức</h1>
    <!-- Nút thêm tin tức -->
    <a href="../news/add.php" class="btn btn-primary mb-3">Thêm Tin tức</a>

    <!-- Bảng danh sách tin tức -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>

<?php //$newsList = isset($newsList) ? $newsList : []; ?>

<?php if (isset($allNews) && is_array($allNews)): ?>
    <?php foreach ($allNews as $news): ?>
            <tr>
                <td><?php echo $news['id']; ?></td>
                <td><?php echo htmlspecialchars($news['title']); ?></td>
                <td>
                    <a href="../../admin/news/edit/<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="/BTTH02/tlunews/admin/news/delete/<?php echo $news['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
<?php else: ?>
    <p class="col-12">Không có tin tức nào!</p>
<?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
