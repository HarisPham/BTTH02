<?php
session_start();  // Bắt đầu session nếu chưa có

require_once './controllers/AdminController.php';
require_once './models/Database.php';

// Kết nối cơ sở dữ liệu
$db = (new Database())->connect();
$adminController = new AdminController($db);

// Lấy đường dẫn từ URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Điều hướng dựa trên URI
switch ($uri) {
    case '/BTTH02/tlunews/admin/login':
        $adminController->login();
        exit();
    case '/BTTH02/tlunews/admin/dashboard':
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            require './views/admin/dashboard.php';  // Hiển thị dashboard nếu là admin
        } else {
            header("Location: /BTTH02/tlunews/admin/login");  // Nếu không phải admin, chuyển về login
            exit();
        }
        break;
    case '/BTTH02/tlunews/':
        require './views/home/index.php';  // Hiển thị trang chủ
        break;
    default:
        header("Location: /BTTH02/tlunews/admin/login");  // Mặc định chuyển về trang login
        exit();
}
