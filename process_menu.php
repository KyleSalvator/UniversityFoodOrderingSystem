<?php
// Check if the form is submitted
if(isset($_POST['submit'])){
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    
    // Process the uploaded image
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_folder = "images/";
    
    // Move the uploaded image to the images folder
    move_uploaded_file($image_temp, $image_folder.$image);
    
    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, image, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdis", $product_name, $description, $price, $image, $status);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        header("Location: staff.php");
} else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
