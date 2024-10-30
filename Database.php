<?php
// Database class to handle the connection to the MySQL database using PDO
class Database {
    private $host = 'localhost';
    private $db_name = 'book_review_db';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Connect to the database and return the connection
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
