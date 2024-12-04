<?php if (!isset($news) || empty($news)): ?>
    <p class="text-danger">Tin tức không tồn tại hoặc đã bị xóa.</p>
<?php else: ?>
    <h1><?= htmlspecialchars($news['title']) ?></h1>
    <img src="<?= htmlspecialchars($news['image']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($news['title']) ?>">
    <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
    <a href="/BTTH02/tlunews" class="btn btn-secondary">Quay lại</a>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TluNews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1><?= $news['title'] ?></h1>
    <img src="<?= $news['image'] ?>" class="img-fluid mb-3" alt="<?= $news['title'] ?>">
    <p><?= $news['content'] ?></p>
    <a href="BTTH02/tlunews" class="btn btn-secondary">Quay lại</a>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>© 2024 TluNews. All Rights Reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
