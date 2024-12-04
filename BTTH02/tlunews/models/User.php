<?php
require_once  './models/Database.php';

class User {
    public function validateLogin($username, $password) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn === null) {
            throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
        }

        try {
            // Truy vấn người dùng với username và password
            $sql = "SELECT id, username, role FROM users WHERE username = :username AND password = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Nếu tìm thấy người dùng, kiểm tra vai trò
            if ($user) {
                if ($user['role'] == 0) {
                    return ['success' => true, 'role' => 0];
                } elseif ($user['role'] == 1) {
                    return ['success' => true, 'role' => 1];
                }
            }

            // Trả về false nếu thông tin không chính xác
            return ['success' => false, 'role' => null];

        } catch (PDOException $e) {
            throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu: " . $e->getMessage());
        }
    }
}