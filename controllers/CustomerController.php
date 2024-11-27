<?php
require_once 'models/Customer.php';

class CustomerController {
    private $customer;

    public function __construct($db) {
        $this->customer = new Customer($db);
    }

    public function index() {
        $customers = $this->customer->getAll();
        include 'views/customers.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            if ($this->customer->create($name, $address, $phone, $email)) {
                header('Location: index.php?page=customers');
            } else {
                echo "Error creating customer.";
            }
        }
    }

    // Add more methods as needed (update, delete, etc.)
}
?>

