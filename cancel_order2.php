<?php
// Check if the order ID is received
if(isset($_POST['orderId'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement to delete the canceled order
    $stmt = $conn->prepare("DELETE FROM ss WHERE order_id = ?");
    $stmt->bind_param("i", $_POST['orderId']);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Order cancellation successful
        echo json_encode(array('success' => true));
    } else {
        // Order cancellation failed
        echo json_encode(array('success' => false));
    }

    // Close the database connection
    $conn->close();
} else {
    // Order ID not received
    echo json_encode(array('success' => false, 'error' => 'Order ID not provided'));
}
?>
