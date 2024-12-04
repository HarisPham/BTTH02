<?php
require_once'./models/News.php';

$news = new News();
$allNews = $news->getAllNews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            background-color: #fff;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .search-bar input {
            border-radius: 50px;
            padding: 10px 20px;
            border: 1px solid #ddd;
        }
        .search-bar button {
            border-radius: 50px;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin/login.php">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="display-4">Chào mừng đến với Trang Tin tức</h1>
        <p class="lead">Cập nhật tin tức mới nhất từ khắp nơi trên thế giới.</p>
        <div class="search-bar mt-4">
            <form action="index.php?controller=home&action=search" method="GET">
                <div class="input-group mx-auto" style="max-width: 600px;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm tin tức..." name="query">
                    <button class="btn btn-light" type="submit">Tìm</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Tin tức -->
<section class="container mt-5">
    <h2 class="text-center mb-4">Tin tức mới nhất</h2>
    <div class="row">
        <?php if (!empty($allNews)): ?>
            <?php foreach ($allNews as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <img src="<?= $item['image'] ?>" class="card-img-top" alt="Hình ảnh tin tức">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['title'] ?></h5>
                            <p class="card-text"><?= substr($item['content'], 0, 100) ?>...</p>
                            <a href="../news/detail.php?id=<?= $item['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="col-12">Không có tin tức nào!</p>
        <?php endif; ?>
    </div>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-4">
        <ul class="pagination">
            <!-- Giả sử số trang là 5 -->
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
        </ul>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2024 Trang Tin tức | Designed by Bạn</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>