<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ufo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the order ID from the request
$order_id = $_GET['order_id'];

// Fetch the order details from the original table
$sql_select = "SELECT * FROM orders WHERE order_id = $order_id";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    // Fetch the row from the result
    $row = $result->fetch_assoc();

    // Insert the order into the new table (ufo table ss)
    $sql_insert = "INSERT INTO ss (order_id, address, email, phone, product_name,quantity, total_price, payment_method) VALUES ('".$row["order_id"]."', '".$row["address"]."', '".$row["email"]."', '".$row["phone"]."', '".$row["product_name"]."','".$row["quantity"]."', '".$row["total_price"]."', '".$row["payment_method"]."')";
    if ($conn->query($sql_insert) === TRUE) {
        // If insertion is successful, delete the order from the original table
        $sql_delete = "DELETE FROM orders WHERE order_id = $order_id";
        if ($conn->query($sql_delete) === TRUE) {
            // Send a success response
            http_response_code(200);
        } else {
            // If deletion fails, send an error response
            http_response_code(500);
        }
    } else {
        // If insertion fails, send an error response
        http_response_code(500);
    }
} else {
    // If order not found, send an error response
    http_response_code(404);
}

$conn->close();
?>
