<?php
// Check if form is submitted
if (isset($_POST['submit_payment'])) {
    // Retrieve form data
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $products = isset($_POST['product']) ? $_POST['product'] : []; // Ensure to use the correct key
    $quantities = isset($_POST['quantity']) ? $_POST['quantity'] : [];
    $total_price = isset($_POST['total']) ? $_POST['total'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';

    // Validate and sanitize input data (not shown for brevity)

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Combine all products and quantities into a single string
    $order_data = [];
    $total_quantity = 0;
    foreach ($products as $index => $product) {
        $quantity = (int)$quantities[$index];
        $total_quantity += $quantity;
        $order_data[] = $product . ':' . $quantity;
    }
    $product_names = implode(',', $order_data);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO orders (address, email, phone, product_name, quantity, total_price, status, payment_method) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdsss", $address, $email, $phone, $product_names, $total_quantity, $total_price, $status, $payment_method);

    // Execute the statement
    $stmt->execute();

    // Redirect to success page
    header("Location: ww.php");

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
