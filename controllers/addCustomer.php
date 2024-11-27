<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'water_jar_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = (int)$_POST['address']; // Ensure this is an integer
    $phone = (int)$_POST['phone']; // Ensure this is a float
    $email = $_POST['email'];

    // Insert query
    $stmt = $conn->prepare("INSERT INTO water_records (customer_name, address, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('sids', $name, $address, $phone, $email); // 's' for string, 'i' for integer, 'd' for decimal, 's' for string (date)

    if ($stmt->execute()) {
        echo "<script>alert('Record added successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Record</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="txt" class="form-control" id="address" name="address" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Phone </label>
                <input type="phone" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" step="0.01" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>
    </div>
</body>
</html>
