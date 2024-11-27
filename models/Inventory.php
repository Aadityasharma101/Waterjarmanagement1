<?php
class Inventory {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM inventory";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function update($id, $quantity) {
        $query = "UPDATE inventory SET quantity = quantity + ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $quantity, $id);
        return $stmt->execute();
    }

    // Add more methods as needed (create, delete, getById, etc.)
}
?>

