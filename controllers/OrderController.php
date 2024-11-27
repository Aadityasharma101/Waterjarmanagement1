<?php
require_once 'models/Order.php';
require_once 'models/Inventory.php';

class OrderController {
    private $order;
    private $inventory;

    public function __construct($db) {
        $this->order = new Order($db);
        $this->inventory = new Inventory($db);
    }

    public function index() {
        $orders = $this->order->getAll();
        include 'views/orders.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_POST['customer_id'];
            $jar_type = $_POST['jar_type'];
            $quantity = $_POST['quantity'];
            $total_price = $_POST['total_price'];

            if ($this->order->create($customer_id, $jar_type, $quantity, $total_price)) {
                $this->inventory->update($jar_type, -$quantity);
                header('Location: index.php?page=orders');
            } else {
                echo "Error creating order.";
            }
        }
    }

    // Add more methods as needed (update, delete, etc.)
}
?>

