<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a form where the manager inputs the cancellation reason
    $orderId = $_POST['orderId'];
    $message = $_POST['message'];

    // Store orderId and message in session variable
    $_SESSION['cancellation_message'] = json_encode(array('orderId' => $orderId, 'message' => $message));

    // Redirect back to pm.php or any other page as needed
    header("Location: pm.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.8, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/2121.png" type="image/x-icon">
    <meta name="description" content="">
    <title>Process Order</title>
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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #c9c9c9;
            background-size: cover;
            background-repeat: no-repeat;            background-repeat: no-repeat; /* Do not repeat the image */   background-image: url('assets/images/mbr-1920x1276.jpg'); /* Set background image */
        background-size: cover; /* Cover the entire screen */
        background-repeat: no-repeat; /* Do not repeat the image */
          opacity: 70%; /* Adjust opacity */

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
            padding: 5px 6px;
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

        .add-menu-btn {
            background-color: #FFC107;
            color: white;
            margin-bottom: 10px;
        }

        .editable input {
            width: 100%;
        }
        .cancelled-message {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            background-color: #ffcccc;
            border: 2px solid #ff0000;
            border-radius: 10px;
            z-index: 9999; /* Ensure it appears above other content */
        }
    </style>
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
                            <a class="nav-link link text-black display-4" href="staff.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-black display-4" href="order.php">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-black display-4" href="pm.php">On Process</a>
                        </li>
                        <li>
                            <a class="nav-link link text-black display-4" href="paymentrecords.php">Records of Payment</a>
                        </li>
                        <li>
                            <a class="nav-link link text-black display-4" href="todeliver2.php">To Deliver</a>
                        </li>
                        <li>
                            <strong>
                                <button>
                                    <a class="btn btn-danger display-4" href="index.php">Log Out</a>
                                </button>
                            </strong>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <center><br><br><br><br><br><br><br>
        <h1>Processed Orders</h1>
    </center>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Action</th>
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
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . $row["total_price"] . "</td>";
                        echo "<td>" . $row["payment_method"] . "</td>";
                        echo "<td>pending</td>"; // Hardcoded status
                        echo  "<td>
    <button class='btn cancel-btn btn-danger' data-order-id='" . $row["order_id"] . "'>
        <img src='assets/images/cancel3.png' alt='Cancel' style='width: 120px; height: 60px;'>
    </button>
    <button class='btn done-btn btn-danger' data-order-id='" . $row["order_id"] . "'>
        <img src='assets/images/confirm3.png' alt='Done' style='width: 120px; height: 60px;'>
    </button>
</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No processed orders found</td></tr>";
                }
                

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    

    <!-- Your JavaScript code -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var doneButtons = document.querySelectorAll('.done-btn');
            doneButtons.forEach(function(doneButton) {
                doneButton.addEventListener('click', function() {
                    var orderId = this.dataset.orderId;
                    var confirmation = confirm("Are you sure you want to mark this order as done?");
                    if (confirmation) {
                        // Send AJAX request to move the order to another page
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'todeliver.php');
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            if (xhr.status === 200 && xhr.responseText === 'success') {
                                // Redirect to your desired path upon success
                                window.location.href = 'todeliver2.php?orderId=' + orderId;
                            } else {
                                console.error('Error occurred while moving the order.');
                            }
                        };
                        xhr.send('orderId=' + orderId);
                    }
                });
            });

            // JavaScript code to handle cancel button click
            var cancelButtons = document.querySelectorAll('.cancel-btn');
        cancelButtons.forEach(function(cancelButton) {
            cancelButton.addEventListener('click', function() {
                var orderId = this.dataset.orderId;
                var message = prompt("Enter cancellation reason:");
                if (message !== null) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'pm.php'); // Send cancellation message to pm.php
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Optional: Handle success response
                            alert("Cancellation message sent successfully!");
                        } else {
                            console.error('Error occurred while sending cancellation message.');
                        }
                    };
                    xhr.send('orderId=' + orderId + '&message=' + encodeURIComponent(message));
                }
            });
        });
    });

    function showOrderCancelledMessage(orderId, message) {
        // Create a new div element for the order cancelled message
        var cancelledMessageDiv = document.createElement('div');
        cancelledMessageDiv.classList.add('cancelled-message');
        cancelledMessageDiv.textContent = 'ORDER #' + orderId + ' CANCELLED: ' + message;
        
        // Insert the message into the body
        document.body.appendChild(cancelledMessageDiv);
        
        // Automatically remove the message after 5 seconds
        setTimeout(function() {
            cancelledMessageDiv.remove();
        }, 5000);
    }
</script>
</body>
</html>
