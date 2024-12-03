<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'tintuc';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
            return null;
        }
        return $this->conn;
    }
}
?>

