<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 fw-bold">Đăng nhập</h2>

    <form action="../../index.php?controller=admin&action=login" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label fw-semibold">Tài khoản:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Mật khẩu:</label>
            <input type="text" id="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Đăng nhập</button>
            <a href="../../index.php?controller=admin&action=index" class="btn btn-secondary ms-2">Quay lại</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>