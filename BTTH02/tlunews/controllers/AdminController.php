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
    public function showUsers() {
        $users = $this->userModel->getAllUsers();
        require './views/admin/users/index.php';
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Mã hóa mật khẩu trước khi lưu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng vào CSDL
            $this->userModel->addUser($username, $hashedPassword, $role);

            // Quay lại trang quản lý người dùng
            header("Location: /BTTH02/tlunews/admin/dashboard");
            exit();
        } else {
            require './views/admin/users/add.php';
        }
    }


    public function editUser($id, $username) {
        $user = $this->userModel->findUserByUsername($username);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Mã hóa mật khẩu nếu có thay đổi
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Cập nhật người dùng trong CSDL
            $this->userModel->updateUser($id, $username, $hashedPassword, $role);

            // Quay lại trang quản lý người dùng
            header("Location: /BTTH02/tlunews/admin/dashboard");
            exit();
        } else {
            require './views/admin/users/edit.php';
        }
    }


    public function deleteUser($id) {
        // Xóa người dùng khỏi CSDL
        $this->userModel->deleteUser($id);

        // Quay lại trang quản lý người dùng
        header("Location: /BTTH02/tlunews/admin/dashboard");
        exit();
    }

}
