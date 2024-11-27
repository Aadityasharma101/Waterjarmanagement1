<?php
class Order {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT o.*, c.name as customer_name FROM orders o JOIN customers c ON o.customer_id = c.id ORDER BY order_date DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($customer_id, $jar_type, $quantity, $total_price) {
        $query = "INSERT INTO orders (customer_id, jar_type, quantity, total_price) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isid", $customer_id, $jar_type, $quantity, $total_price);
        return $stmt->execute();
    }

    // Add more methods as needed (update, delete, getById, etc.)
}
?>

