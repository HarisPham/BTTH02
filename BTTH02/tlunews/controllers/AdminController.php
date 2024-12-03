<?php
require_once 'models/User.php';

class AdminController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        // Bắt đầu session nếu chưa bắt đầu
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Lấy thông tin người dùng từ database
            $user = $this->userModel->findUserByUsername($username);

            // Xác thực mật khẩu (so sánh trực tiếp)
            if ($user && $password == $user['password']) {
                // Lưu thông tin đăng nhập vào session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];  // Lưu vai trò (0 hoặc 1)

                // Phân quyền dựa trên role
                if ($user['role'] == 1) {
                    // Quản trị viên
                    header("Location: /BTTH02/tlunews/admin/dashboard.php");
                } elseif ($user['role'] == 0) {
                    // Người dùng thường
                    header("Location: /BTTH02/tlunews/index.php");
                }
                exit();
            } else {
                // Thông báo lỗi nếu mật khẩu không đúng
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                require 'views/admin/login.php';
            }
        } else {
            // Hiển thị form đăng nhập nếu không phải POST
            require 'views/admin/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy(); // Hủy session
        header("Location: /BTTH02/tlunews/admin/login.php");
        exit();
    }
}
?>
