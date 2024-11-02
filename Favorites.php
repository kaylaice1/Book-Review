<?php
class Favorite {
    private $conn;
    private $table = 'favorites';

    public $id;
    public $user_id;
    public $book_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add a book to favorites
    public function addFavorite() {
        $query = 'INSERT INTO ' . $this->table . ' (user_id, book_id) VALUES (:user_id, :book_id)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':book_id', $this->book_id);

        return $stmt->execute();
    }

    // Get all favorite books for a specific user
    public function getFavoritesByUser() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        return $stmt;
    }
}
?>
