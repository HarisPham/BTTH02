<?php

require_once __DIR__ . '/../models/Database.php';

class News {
//    private $db;
//
//    public function __construct($db) {
//        $this->db = $db;
//    }

//    public function getAll() {
//        $stmt = $this->db->query("SELECT * FROM news");
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    public function getAllNews()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        $sql = "SELECT * FROM news";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn === null) {
            throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
        }

        try {
            // Truy vấn thông tin tin tức theo ID
            $sql = "SELECT id, title, content, image, created_at, category_id FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Lấy dữ liệu tin tức và trả về
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    public function addNews($title, $content, $image, $created_date, $category_id) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn === null) {
            throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
        }

        try {
            $sql = "INSERT INTO news (title, content, image, created_at, category_id) VALUES (:title, :content, :image, :created_at, :category_id)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            if ($image === '') {
                $stmt->bindValue(':image', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(':image', $image);
            }

            if ($created_date === '') {
                $stmt->bindValue(':created_at', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(':created_at', $created_date);
            }

            if ($category_id === null) {
                $stmt->bindValue(':category_id', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(':category_id', $category_id);
            }

            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi thêm sản phẩm: " . $e->getMessage());
        }
    }

    public function deleteNews($id) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn === null) {
            throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
        }

        try {
            $sql = "DELETE FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi xóa bản ghi: " . $e->getMessage());
        }
    }
}
?>