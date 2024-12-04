<?php
class HomeController {
    private $db;
    private $newsModel;

    public function __construct($db) {
        $this->db = $db;
        $this->newsModel = new News($this->db);  // Khởi tạo NewsModel
    }

    public function showHome() {
        // Lấy danh sách tin tức từ NewsModel
        $newsList = $this->newsModel->getAllNews();

        if ($newsList) {
            require './views/home/index.php';  // Truyền $newsList vào view
        } else {
            echo "Không có tin tức nào!";
        }
    }

    // Các phương thức khác nếu cần thiết
}

?>
