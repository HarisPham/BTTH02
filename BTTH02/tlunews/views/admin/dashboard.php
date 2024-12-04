<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra nếu chưa đăng nhập hoặc không phải quản trị viên
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /BTTH02/tlunews/admin/login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-logout {
            align-items: center;
            gap: 0.5rem;
            border-color: #dc3545;
        }

        .btn-logout:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
        }

        .btn-logout i {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Chào mừng đến trang Quản trị!</h1>
    <p>Xin chào, Quản trị viên!</p>
    <p>Đây là giao diện quản trị, bạn có thể quản lý các mục như tin tức và người dùng.</p>
    <div class="row">
        <div class="col-md-4">
            <a href="/BTTH02/tlunews/admin/news" class="btn btn-success w-100 mb-3">Quản lý tin tức</a>
        </div>
        <div class="col-md-4">
            <button class="btn btn-warning w-100 mb-3" data-bs-toggle="modal" data-bs-target="#userManagementModal">Quản lý người dùng</button>
        </div>
        <div class="col-md-4">
            <a href="/BTTH02/tlunews/admin/logout" class="btn btn-logout w-30 mt-3">
                <i class="bi bi-box-arrow-right"></i> Đăng xuất
            </a>
        </div>
    </div>
</div>

<!-- Modal quản lý người dùng -->
<div class="modal fade" id="userManagementModal" tabindex="-1" aria-labelledby="userManagementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userManagementModalLabel">Quản lý Người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="/BTTH02/tlunews/admin/users/add" class="btn btn-primary mb-3">Thêm người dùng</a>
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Vai trò</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($users) && is_array($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= $user['role'] == 1 ? 'Quản trị viên' : 'Người dùng' ?></td>
                                <td>
                                    <a href="/BTTH02/tlunews/admin/users/edit/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/BTTH02/tlunews/admin/users/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Không có người dùng nào.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
