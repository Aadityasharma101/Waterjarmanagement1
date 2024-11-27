<?php
require_once 'models/Inventory.php';

class InventoryController {
    private $inventory;

    public function __construct($db) {
        $this->inventory = new Inventory($db);
    }

    public function index() {
        $inventory = $this->inventory->getAll();
        include 'views/inventory.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];

            if ($this->inventory->update($id, $quantity)) {
                header('Location: index.php?page=inventory');
            } else {
                echo "Error updating inventory.";
            }
        }
    }

    // Add more methods as needed (create, delete, etc.)
}
?>

