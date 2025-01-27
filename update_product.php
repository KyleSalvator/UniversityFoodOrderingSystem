<?php
// Check if a POST request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a product ID is provided
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // Connect to your database
        $conn = new mysqli('localhost', 'root', '', 'ufo');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update product information based on the provided fields
        // For example, update product name, description, price, image, and status
        // Note: You should sanitize and validate the input data to prevent SQL injection and other security vulnerabilities
        // For simplicity, this example assumes direct use of input data without sanitization/validation
        $productName = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $status = $_POST['status'];

        // Check if a new image is uploaded
        if ($image['error'] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($image["name"]);

            // Move the uploaded file to the desired location
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                // Update the product information in the database with the new image path
                $sql = "UPDATE products SET product_name='$productName', description='$description', price='$price', image='$targetFile', status='$status' WHERE product_id='$productId'";

                if ($conn->query($sql) === TRUE) {
                    // Return JSON response indicating success and the new image URL
                    echo json_encode(array("success" => true, "image_url" => $targetFile));
                } else {
                    echo json_encode(array("success" => false, "message" => "Error updating record: " . $conn->error));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Error uploading image."));
            }
        } else {
            // Update the product information in the database without changing the image
            $sql = "UPDATE products SET product_name='$productName', description='$description', price='$price', status='$status' WHERE product_id='$productId'";

            if ($conn->query($sql) === TRUE) {
                // Return JSON response indicating success and no change in the image URL
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false, "message" => "Error updating record: " . $conn->error));
            }
        }

        $conn->close();
    } else {
        echo json_encode(array("success" => false, "message" => "Product ID is missing."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
