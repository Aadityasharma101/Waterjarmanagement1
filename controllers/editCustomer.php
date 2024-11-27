<?php
$conn = new mysqli('localhost', 'root', '', 'water_jar_management');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE water_records SET customer_name = ?, water_quantity = ?, price = ?, delivery_date = ?, status = ? WHERE id = ?");
    $stmt->bind_param('sissi', $name, $address, $phone, $email,  $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
}
// Fetch record for editing
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM customers WHERE id = $id");
$record = $result->fetch_assoc();
$conn->close();
?>
<!-- HTML form pre-filled with $record data -->
