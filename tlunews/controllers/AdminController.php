<?php
require_once './models/User.php';
require_once './models/News.php';

class AdminController {
    public function index() {
        header("Location: views/home/index.php");
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = new User();
            $result = $user->validateLogin($username, $password);
            if ($result['success']) {
                if ($result['role'] == 0) {
                    header("Location: views/home/index.php");
                    exit();
                } elseif ($result['role'] == 1) {
                    header("Location: views/admin/dashboard.php");
                    exit();
                }
            } else {
                header("Location: views/admin/login.php");
            }
        } else {
            // Nếu là GET, hiển thị trang login
            header("Location: views/admin/login.php");
        }
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'] ?? '';
            $dateCreated = $_POST['dateCreated'] ?? '';
            $categoryId = $_POST['categoryId'] ?? '';

            $news = new News();
            $news->addNews($title, $content, $image, $dateCreated, $categoryId);

            header("Location: views/admin/dashboard.php");
            exit();
        }

        include __DIR__ . '/views/admin/news/add.php';
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $news = new News();
            $newsEdit = $news-> getNewsById($id);

            include __DIR__ . '/views/admin/news/edit.php';
        }


    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];

            $news = new News();
            $news->deleteNews($id);

            header("Location: views/admin/dashboard.php");
            exit();
        }
        echo "Yêu cầu không hợp lệ.";
    }


}

?>