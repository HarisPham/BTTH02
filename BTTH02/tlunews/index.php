<?php
session_start();  // Bắt đầu session nếu chưa có

require_once './controllers/AdminController.php';
require_once './controllers/NewsController.php';
require_once './models/Database.php';

// Kết nối cơ sở dữ liệu
$db = (new DBConnection())->getConnection();
$adminController = new AdminController($db);
$newsController = new NewsController();

// Lấy đường dẫn từ URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Điều hướng dựa trên URI
switch ($uri) {
    case '/BTTH02/tlunews/admin/login':
        $adminController->login();
        exit();
    case '/BTTH02/tlunews/admin/dashboard':
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $adminController->showUsers();
        }
        elseif (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
            $adminController->showHome();}
        else {
            header("Location: /BTTH02/tlunews/admin/login");  // Nếu không phải admin, chuyển về login
            exit();
        }
        break;
    case '/BTTH02/tlunews/admin/users/add':
        $adminController->addUser();
        exit();

    case (preg_match('/\/BTTH02\/tlunews\/admin\/users\/edit\/([\w]+)/', $uri, $matches) ? true : false):
        $adminController->editUser($matches[1]);
        exit();

    case '/BTTH02/tlunews/admin/users/delete':
        if(preg_match('/\/BTTH02\/tlunews\/admin\/users\/delete\/(\d+)/', $uri, $matches)) {
            $adminController->deleteUser($matches[1]);  // Gọi hàm xóa ở đây
        }
        break;

    case '/BTTH02/tlunews/admin/news':  // Hiển thị danh sách tin tức
        $newsController->showNews();  // Gọi phương thức showNews
        exit();
    case (preg_match('/BTTH02/tlunews/news/detail/(\d+)/', $uri, $matches) ? true : false):
        $newsController->detail($matches[1]);
        exit();

    case '/BTTH02/tlunews/':  // Trang chủ mặc định
        require './views/home/index.php';  // Hiển thị trang chủ
        break;

    case '/BTTH02/tlunews/home':  // Trang chủ cho user
        if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {  // Kiểm tra nếu là user
            require './views/user/home.php';  // Hiển thị trang chủ của user
        } else {
            header("Location: /BTTH02/tlunews/admin/login");  // Nếu không phải user, chuyển về login
            exit();
        }
        break;
    default:
        header("Location: /BTTH02/tlunews");  // Mặc định chuyển về trang login
        exit();
}
