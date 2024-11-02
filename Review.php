<?php
class Review {
    private $conn;
    private $table = 'reviews';

    public $id;
    public $user_id;
    public $book_id;
    public $review_text;
    public $rating;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add a review
    public function addReview() {
        $query = 'INSERT INTO ' . $this->table . ' (user_id, book_id, review_text, rating) VALUES (:user_id, :book_id, :review_text, :rating)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':book_id', $this->book_id);
        $stmt->bindParam(':review_text', $this->review_text);
        $stmt->bindParam(':rating', $this->rating);

        return $stmt->execute();
    }

    // Get reviews for a specific book
    public function getReviewsByBook() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE book_id = :book_id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':book_id', $this->book_id);
        $stmt->execute();
        return $stmt;
    }
}
?>
