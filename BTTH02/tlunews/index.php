<?php
require_once './controllers/AdminController.php';
require_once './controllers/NewsController.php';
require_once './models/Database.php';

// Kết nối cơ sở dữ liệu
$db = (new Database())->connect();
$adminController = new AdminController($db);
$newsController = new NewsController($db);

// Lấy đường dẫn từ URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Định tuyến
switch ($uri) {
    // Đăng nhập
    case '/BTTH02/tlunews/admin/login':
        $adminController->login();
        break;

    // Đăng xuất
    case '/BTTH02/tlunews/admin/logout':
        $adminController->logout();
        break;

    // Dashboard quản trị viên
    case '/BTTH02/tlunews/admin/dashboard':
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            require './views/admin/dashboard.php';
        } else {
            header("Location: /BTTH02/tlunews/admin/login");
        }
        break;

    // Quản lý tin tức
    case '/BTTH02/tlunews/admin/news':
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $newsController->index();
        } else {
            header("Location: /BTTH02/tlunews/admin/login");
        }
        break;

    // Thêm tin tức
    case '/BTTH02/tlunews/admin/news/add':
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $newsController->add();
        } else {
            header("Location: /BTTH02/tlunews/admin/login");
        }
        break;

    // Sửa tin tức
    default:
        if (preg_match('/^\/BTTH02\/tlunews\/admin\/news\/edit\/(\d+)$/', $uri, $matches)) {
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                $newsController->edit($matches[1]);
            } else {
                header("Location: /BTTH02/tlunews/admin/login");
            }
        }
        // Xóa tin tức
        elseif (preg_match('/^\/BTTH02\/tlunews\/admin\/news\/delete\/(\d+)$/', $uri, $matches)) {
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                $newsController->delete($matches[1]);
            } else {
                header("Location: /BTTH02/tlunews/admin/login");
            }
        }
        // Hiển thị trang chủ
        else {
            $content = './views/home/index.php';
        }
        break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLU News</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">TLU NEWS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/BTTH02/tlunews/admin/news">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/BTTH02/tlunews/admin/login">Quản trị</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <?php
    if (isset($content)) {
        include $content;
    } else {
        echo "<h1>Chào mừng đến với TLU News</h1>";
    }
    ?>
</div>

<!-- Footer -->
<footer class="bg-dark text-center text-white py-3 mt-5">
    <p>© 2024 TLU News. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
