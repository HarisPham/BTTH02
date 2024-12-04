// views/home/index.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Trang chủ</h1>

    <!-- Hiển thị danh sách tin tức -->
    <div>
        <h3>Danh sách Tin tức</h3>
        <ul>
            <?php if (!empty($newsList)): ?>
                <?php foreach ($newsList as $news): ?>
                    <li>
                        <a href="/BTTH02/tlunews/news/detail/<?php echo $news['id']; ?>">
                            <?php echo htmlspecialchars($news['title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Không có tin tức nào!</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
</body>
</html>
