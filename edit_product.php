<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product ID
    $product_id = $_POST['product_id'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to update the product information
    $sql = "UPDATE products SET 
            product_name = ?,
            description = ?,
            price = ?,
            image = ?,
            status = ?
            WHERE product_id = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdssi", $product_name, $description, $price, $image, $status, $product_id);

    // Set parameters and execute the statement
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Here you might handle file uploads
    $status = $_POST['status'];
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to the seller interface page after updating
    header("Location: staff.php");
    exit();
}
?>
