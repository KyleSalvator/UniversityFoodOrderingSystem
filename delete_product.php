<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if productId is set in the POST data
    if(isset($_POST['productId'])){
        // Retrieve productId from the POST data
        $productId = $_POST['productId'];

        // Connect to your database
        $conn = new mysqli('localhost', 'root', '', 'ufo');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement for deleting a product
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $productId);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            // Return a JSON response indicating success
            echo json_encode(array("success" => true));
        } else {
            // Return a JSON response indicating failure
            echo json_encode(array("success" => false, "message" => "Failed to delete product"));
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    } else {
        // Return a JSON response indicating that productId is not set
        echo json_encode(array("success" => false, "message" => "Product ID is not set"));
    }
} else {
    // Return a JSON response indicating that the request method is not POST
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
