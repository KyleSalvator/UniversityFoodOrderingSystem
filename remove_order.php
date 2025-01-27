<?php
// Connect to your database
$conn = new mysqli('localhost', 'root', '', 'ufo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the order ID from the URL parameter
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Prepare a delete statement
    $sql = "DELETE FROM orders WHERE order_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $orderId);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Order deleted successfully
            echo "Order deleted successfully.";
        } else {
            // Failed to delete the order
            echo "Error deleting order: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }
} else {
    echo "No order ID specified.";
}

// Close connection
$conn->close();
?>
