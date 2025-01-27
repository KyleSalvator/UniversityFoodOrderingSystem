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

    <title>To Pick Up Orders</title>
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

    <div class="container"><br><br><br><br><br><br><br><br><br>
        <h1 class="animate__animated animate__bounceUpDown">Ready to Pick Up</h1>

        <table class="table animate__animated animate__fadeIn">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Product </th>
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

                // Query to fetch orders marked as 'Done'
                $sql = "SELECT * FROM to_deliver WHERE Paid_By IS NULL OR Paid_By = ''" ;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";

                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='1'>No orders found</td></tr>";
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
