<?php
require_once'./models/News.php';

$news = new News();
$allNews = $news->getAllNews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container">
    <h3 class="text-center text-success my-3 fw-bold">Dashboard</h3>

    <a href="news/add.php" class="btn btn-success my-3">Thêm mới</a>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Date Created</th>
            <th scope="col">Category ID</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allNews as $news) {
            ?>
            <tr>
                <th scope="row"><?= $news['title']; ?></th>
                <td><?= $news['content']; ?></td>
                <td><?= $news['image']; ?></td>
                <td><?= $news['created_at']; ?></td>
                <td><?= $news['category_id']; ?></td>
                <td>
                    <a href="news/edit.php?id=<?= $news['id'] ?>">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
                <td>
                    <a href="../../index.php?controller=admin&action=delete&id=<?= $news['id']; ?>"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                        <i class="bi bi-trash3"></i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>