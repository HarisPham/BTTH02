<?php
require_once './models/User.php';

class AdminController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Lấy thông tin người dùng từ database
            $user = $this->userModel->findUserByUsername($username);

            // Xác thực mật khẩu
            if ($user && $password === $user['password']) {  // So sánh trực tiếp, không mã hóa
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];  // Lưu vai trò (0: user, 1: admin)

                // Phân quyền dựa trên role
                if ($user['role'] == 1) {
                    header("Location: /BTTH02/tlunews/admin/dashboard");
                } else {
                    header("Location: /BTTH02/tlunews/");
                }
                exit();
            } else {
                // Lỗi đăng nhập
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                require './views/admin/login.php';
            }
        } else {
            // Hiển thị form đăng nhập
            require './views/admin/login.php';
        }
    }
}
