<?php
require_once'./models/News.php';

// Kiểm tra nếu có ID trong URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Tạo đối tượng News và lấy thông tin chi tiết của tin tức
    $news = new News();
    $newsDetails = $news->getNewsById($id);
} else {
    // Nếu không có ID, chuyển hướng về trang chủ
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tin tức</title>
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
            height: 300px;
            object-fit: cover;
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
    </div>
</nav>

<!-- Chi tiết tin tức -->
<section class="container mt-5">
    <h2 class="text-center mb-4"><?= $newsDetails['title']; ?></h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <img src="<?= $newsDetails['image']; ?>" class="card-img-top" alt="Hình ảnh tin tức">
                <div class="card-body">
                    <p class="card-text"><?= $newsDetails['content']; ?></p>
                    <p class="text-muted">Ngày đăng: <?= $newsDetails['created_at']; ?></p>
                    <p class="text-muted">Danh mục ID: <?= $newsDetails['category_id']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2024 Trang Tin tức | Designed by Bạn</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>