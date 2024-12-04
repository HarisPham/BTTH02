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
                } elseif ($user['role'] == 0) {
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
        require './views/admin/dashboard.php';
    }
    public function showHome() {
        require './views/home/index.php';
    }


    public function addUser() {
        // Kiểm tra quyền truy cập
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
            header("Location: /BTTH02/tlunews/admin/login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Kiểm tra dữ liệu nhập
            if (empty($username) || empty($password) || !isset($role)) {
                $error = "Vui lòng điền đầy đủ thông tin!";
                require './views/admin/users/add.php';
                return;
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng vào CSDL
            $this->userModel->addUser($username, $hashedPassword, $role);

            // Chuyển hướng về danh sách người dùng
            header("Location: /BTTH02/tlunews/admin/dashboard");
            exit();
        } else {
            // Hiển thị form thêm người dùng
            require './views/admin/users/add.php';
        }
    }



    public function editUser($id) {
        // Lấy thông tin người dùng theo ID
        $user = $this->userModel->findUserById($id);

        if (!$user) {
            echo "Người dùng không tồn tại!";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Mã hóa mật khẩu nếu có thay đổi
            $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $user['password'];

            // Cập nhật thông tin người dùng
            $this->userModel->updateUser($id, $username, $hashedPassword, $role);

            // Chuyển hướng sau khi cập nhật
            header("Location: /BTTH02/tlunews/admin/dashboard");
            exit();
        }

        // Hiển thị form chỉnh sửa
        require './views/admin/users/edit.php';
    }
    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['id']; // Nhận ID người dùng từ POST request
            if ($this->userModel->deleteUserById($userId)) {
                echo "Xóa thành công";
            } else {
                echo "Xóa thất bại";
            }
        }
    }

}
