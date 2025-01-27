<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ufo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['orderId'])) {
    // Retrieve the order ID from the POST data
    $orderId = $_POST['orderId'];

    // Prepare and execute the SQL query to insert the order into to_deliver table
    $sql = "INSERT INTO to_deliver (order_id, address, email, phone, product_name, quantity, total_price, payment_method) 
            SELECT order_id, address, email, phone, product_name,quantity ,total_price, payment_method
            FROM ss 
            WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId);

    if ($stmt->execute()) {
        // If insertion is successful, you can optionally delete the order from the original table (ss)
        // For demonstration purposes, let's assume you're deleting it
        $deleteSql = "DELETE FROM ss WHERE order_id = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("i", $orderId);
        $deleteStmt->execute();

        // Send success response
        echo "success";
    } else {
        // Send error response
        echo "error";
    }
}

// Close the connection
$conn->close();
?>
