<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'models/Database.php';
require_once 'models/User.php';

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kết nối cơ sở dữ liệu
    $db = (new Database())->connect();
    $userModel = new User($db);

    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $user = $userModel->findUserByUsername($username);

    // Kiểm tra thông tin người dùng và mật khẩu
    if ($user && $password == $user['password']) {  // So sánh mật khẩu trực tiếp
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];  // Lưu vai trò (0 hoặc 1)

        // Phân quyền dựa trên vai trò
        if ($user['role'] == 1) {
            // Quản trị viên
            header("Location: /BTTH02/tlunews/admin/dashboard.php");
        } elseif ($user['role'] == 0) {
            // Người dùng thường
            header("Location: /BTTH02/tlunews/index.php");
        }
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Đăng nhập</h3>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="/BTTH02/tlunews/admin/login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Tên đăng nhập" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Đăng nhập</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
