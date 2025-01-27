<?php
// Check if form is submitted
if (isset($_POST['submit_payment'])) {
    // Retrieve form data
    $total = isset($_POST['total']) ? $_POST['total'] : 0;
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $delivery_address = isset($_POST['delivery_address']) ? $_POST['delivery_address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';

    // Validate and sanitize input data (not shown for brevity)

    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO payments (email, delivery_address, phone, payment_method, total_amount) 
            VALUES ('$email', '$delivery_address', '$phone', '$payment_method', '$total')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
