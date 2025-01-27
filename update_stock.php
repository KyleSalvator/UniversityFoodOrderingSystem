<?php
// This code assumes you have received the order ID or order details from the frontend
$order_id = $_POST['order_id'];

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ufo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the order details from the database (assuming you have a table for orders)
$sql = "SELECT * FROM orders WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // For each item in the order, update the status
        $items = json_decode($row['items'], true); // Assuming items are stored as JSON in the orders table

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            // Update the status in the products table
            $sqlUpdatestatus = "UPDATE products SET status = status - ? WHERE product_id = ?";
            $stmtUpdatestatus = $conn->prepare($sqlUpdatestatus);
            $stmtUpdatestatus->bind_param("ii", $quantity, $productId);
            $stmtUpdatestatus->execute();
        }
    }
}

// Close the database connection
$conn->close();
?>
