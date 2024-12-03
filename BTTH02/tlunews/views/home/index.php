<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Main Content -->
<div class="container mt-5">
    <h1 class="mb-4">Danh Sách Tin Tức</h1>
    <div class="row">
        <?php if (isset($news) && is_array($news)): ?>
            <?php foreach ($news as $item): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- Hiển thị hình ảnh tin tức, nếu có -->
                        <img src="<?= !empty($item['image']) ? $item['image'] : 'default_image.jpg' ?>" class="card-img-top" alt="<?= htmlspecialchars($item['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['title']) ?></h5>
                            <p class="card-text text-truncate"><?= substr($item['content'], 0, 100) ?>...</p>
                            <a href="index.php?controller=news&action=detail&id=<?= $item['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có tin tức để hiển thị.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
