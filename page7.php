<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    // If user is not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// Retrieve user data from session variables
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v5.9.8, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.8, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/2121.png" type="image/x-icon">
    <meta name="description" content="">

    <title>UFO Payment Method</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/animatecss/animate.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900i&display=swap"></noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('assets/images/09.jpg'); /* Set background image */
            background-size: cover; /* Cover the entire screen */
            background-repeat: no-repeat; /* Do not repeat the image */
            opacity: 80%; /* Adjust opacity */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #0066cc;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #4caf50;
        }

        .remove-btn {
            background-color: #f44336;
        }

        .save-btn {
            background-color: #2196f3;
        }

        .editable input {
            width: 100%;
        }
    </style>

</head>

<body>

    <section data-bs-version="5.1" class="menu menu5 cid-tY2kb0oEHR" once="menu" id="menu05-2d">
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4">UFO</a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item">
                            <a class="nav-link link text-black display-4" href="page5.php">Main Item</a>
                        </li>
                        <li>
                            <a class="nav-link link text-black display-4" id="proceedToPaymentBtn" href="page7.php">Proceed to Payment</a>
                        </li>
                        <li>
                            <a class="nav-link link text-black display-4" href="processing.php">Processing</a>
                        </li>
                        <li>
                            <a class="nav-link link text-black display-4" href="rr.php">Ready to PickUp</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle display-4" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#"><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></a>
              <a class="dropdown-item" href="#"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></a>
              <a class="dropdown-item" href="#"><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php">Log Out</a>
            </div>
          </li>
        </ul>
                </div>
            </div>
        </nav>
    </section>
    <section data-bs-version="5.1" class="contacts01 cid-tY2RwRkZlu" id="contacts01-2g">
        <center>
            <h2><br><br><br>Select Payment Method</h2>
            <form id="paymentForm" action="process_payment.php" method="post">
                <!-- Hidden input for total amount -->
                <input type="hidden" name="total" value="<?php echo isset($_GET['total']) ? $_GET['total'] : '0'; ?>">
                <!-- Display total amount -->

                <!-- Input field for product -->

                <!-- Payment method options -->

                <!-- PHP code to display order details -->
                <?php
                // Retrieve the order details from query parameters
                $total = isset($_GET['total']) ? $_GET['total'] : 0;
                $products = isset($products) ? $products : [];
                $prices = [];

                // Loop through the query parameters to extract product names and prices
                foreach ($_GET as $key => $value) {
                    if (strpos($key, 'product') === 0) {
                        $products[] = $value;
                    } elseif (strpos($key, 'price') === 0) {
                        $prices[] = $value;
                    }
                }

                // Display the order details
                if (!empty($products) && !empty($prices)) {
                    echo "<p><strong>Total:</strong> ₱$total</p>";
                    echo "<h2>Ordered Items:</h2>";

                    // Initialize an associative array to store the quantity of each product
                    $productQuantities = [];

                    // Count the quantity of each product
                    for ($i = 0; $i < count($products); $i++) {
                        // Get the product name
                        $product = $products[$i];

                        // Increment the quantity for this product
                        if (!isset($productQuantities[$product])) {
                            $productQuantities[$product] = 0;
                        }
                        $productQuantities[$product]++;
                    }

                    // Display each product and its quantity
                    foreach ($productQuantities as $product => $quantity) {
                        echo "Product: $product, Quantity: $quantity<br>";
                        echo '<div class="form-group" style="display: none;">';
                        echo '<label for="product_' . $product . '">Product:</label>';
                        echo '<input type="text" id="product_' . $product . '" name="product[]" placeholder="Enter the product name" value="' . htmlspecialchars($product) . '">';

                        echo '<label for="quantity_' . $product . '">Quantity:</label>';
                        echo '<input type="number" id="quantity_' . $product . '" name="quantity[]" placeholder="Enter the quantity" value="' . $quantity . '">';

                        echo "</div>";
                    }
                } else {
                    echo "<p id='noOrderError' style='color: red;'>No orders found.</p>";
                }
                ?>
                <label for="gcash">
                    <input type="radio" id="gcash" name="payment_method" value="gcash">
                    Gcash
                </label>
                <label for="cod">
                    <input type="radio" id="cod" name="payment_method" value="cash">
                    Cash
                </label>

                <!-- Input fields for email, name, and phone -->
                <div class="container">
                    <div class="row">
                    <div class="item features-without-image col-12 col-md-6 active">
                            <div class="item-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                        <strong>Email</strong>
                                    </h6>
                                    <input type="email" name="email" placeholder="Enter your email">
                                </div>
                            </div>
                        </div>
                        <div class="item features-without-image col-12 col-md-6 active">
                            <div class="item-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                        <strong>Delivery Instruction?</strong>
                                    </h6>
                                    <textarea name="address" placeholder="Enter Room number/which building"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="item features-without-image col-12 col-md-6">
                            <div class="item-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                        <strong>Phone</strong>
                                    </h6>
                                    <input type="tel" name="phone" placeholder="Enter your phone number">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit_payment">Submit Payment</button>
            </form>
            <br>
            <br>
            <center>
                <a href="page5.php">Back</a>
            </center>
        </center>
    </section>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/ytplayer/index.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script>
         document.getElementById('paymentForm').addEventListener('submit', function(event) {
            // Check if a payment method is selected
            var gcash = document.getElementById('gcash').checked;
            var cash = document.getElementById('cod').checked;

            // Check if there are any orders
            var noOrderError = document.getElementById('noOrderError');

            if (noOrderError) {
                alert('No order selected.');
                event.preventDefault();
                return;
            }

            if (!gcash && !cash) {
                // Display error message
                alert('Select Payment Method Gcash ba or cash.');
                // Prevent form submission
                event.preventDefault();
            }
        });
    </script>
</body>

</html>

