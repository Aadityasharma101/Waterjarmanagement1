<?php
class Customer {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM customers";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($name, $address, $phone, $email) {
        $query = "INSERT INTO customers (name, address, phone, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $name, $address, $phone, $email);
        return $stmt->execute();
    }

    // Add more methods as needed (update, delete, getById, etc.)
}
?>

