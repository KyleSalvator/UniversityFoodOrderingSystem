<?php
session_start(); // Start the session

// Check if the cancellation message is set in the session
if (isset($_SESSION['cancellation_message'])) {
    $cancellationMessage = json_decode($_SESSION['cancellation_message'], true); // Decode the JSON string
    $orderId = $cancellationMessage['orderId']; // Retrieve orderId
    $message = $cancellationMessage['message']; // Retrieve message

    // Display the orderId and message
    $displayMessage = "ORDER #$orderId CANCELLED: $message";

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to delete the cancelled order from the ss table
    $sql = "DELETE FROM ss WHERE order_id = '$orderId'";
    if ($conn->query($sql) === TRUE) {
        $removalMessage = "Order Cancelled";
    } else {
        $removalMessage = "Error removing order: " . $conn->error;
    }

    // Unset the session variable after removing the order
    unset($_SESSION['cancellation_message']);
    
    $conn->close();
} else {
    $displayMessage = null;
    $removalMessage = null;
}
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

    <title>On Proccess Orders</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/animatecss/animate.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #c9c9c9;
            background-size: cover; /* Cover the entire screen */
            background-repeat: no-repeat; /* Do not repeat the image */background-image: url('assets/images/09.jpg'); /* Set background image */
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
            color: white;
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
        /* Style for the cancellation message */
        .cancellation-message {
            font-size: 24px;
            font-weight: bold;
            color: red;
            text-align: center;
            margin-top: 20px;
            background-color: #ffcccc;
            padding: 10px;
            border: 2px solid #ff0000;
            border-radius: 10px;
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
                    <li>
                        <strong><button><a class="btn btn-danger display-4" href="index.php">Log Out</a></button></strong>
                    </li>
                </div>
            </div>
        </nav>
    </section>

    <div class="container"><br><br><br><br><br><br><br><br><br>
        <h1 class="animate__animated animate__bounceInDown">Processed Orders</h1>

        <?php
        if ($displayMessage) {
            echo "<div class='cancellation-message'>$displayMessage</div>";
        }
        if ($removalMessage) {
            echo "<div class='cancellation-message'>$removalMessage</div>";
        }
        ?>

        <table class="animate__animated animate__fadeIn">
            <thead>
                <tr>
                    <th>Order ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the database
                $conn = new mysqli('localhost', 'root', '', 'ufo');

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch accepted orders from ss table
                $sql = "SELECT * FROM ss";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='1'>No processed orders found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="assets/ytplayer/index.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <input name="animation" type="hidden">
</body>

</html>
