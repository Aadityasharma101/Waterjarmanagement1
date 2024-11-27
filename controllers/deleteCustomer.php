<?php
$conn = new mysqli('localhost', 'root', '', 'water_jar_management');
$id = $_GET['id'];
$conn->query("DELETE FROM customers WHERE id = $id");
$conn->close();
header("Location: CustomerController.php");
?>
