<?php
class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findUserByUsername($username) {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Kiểm tra nếu có dữ liệu và trả về kết quả
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về mảng kết quả
        }

        return null;
    }
}

?>
