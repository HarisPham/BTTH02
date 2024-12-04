<?php
session_start();  // Bắt đầu session nếu chưa có

require_once './controllers/AdminController.php';
require_once './models/Database.php';
require_once './controllers/NewsController.php';

$controller = $_GET['controller'] ?? 'index';
$action = $_GET['action'] ?? 'index';

if ($controller && $action) {
    switch ($controller) {
        case 'admin':
            $adminController = new AdminController();
            if ($action === 'index') {
                $adminController->index();
            } elseif ($action === 'login') {
                $adminController->login();
            }
            break;

        case 'news':
            $newsController = new NewsController();
            if ($action === 'add') {
                $newsController->add();
            } elseif ($action === 'update') {
                $newsController->update();
            } elseif ($action === 'delete') {
                $newsController->delete();
            }
            break;

        case 'home':
            $homeController = new HomeController();
            if ($action === 'search') {
                $homeController->search();
            }
            break;

        default:
            $adminController = new AdminController();
            $adminController->index();
            break;
    }
}