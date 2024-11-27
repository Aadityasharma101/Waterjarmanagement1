<?php
require_once 'config/database.php';
require_once 'controllers/CustomerController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/InventoryController.php';

$customerController = new CustomerController($conn);
$orderController = new OrderController($conn);
$inventoryController = new InventoryController($conn);

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

include 'includes/header.php';

switch ($page) {
    case 'dashboard':
        $customers = $customerController->index();
        $orders = $orderController->index();
        $inventory = $inventoryController->index();
        include 'views/dashboard.php';
        break;
    case 'customers':
        if ($action === 'create') {
            $customerController->create();
        } else {
            $customerController->index();
        }
        break;
    case 'orders':
        if ($action === 'create') {
            $orderController->create();
        } else {
            $orderController->index();
        }
        break;
    case 'inventory':
        if ($action === 'update') {
            $inventoryController->update();
        } else {
            $inventoryController->index();
        }
        break;
    default:
        echo "404 - Page not found";
        break;
}

//include 'includes/footer.php';
?>

