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
    <title>Staff Order Interface</title>
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
            background-size: cover; /* Cover the entire screen */
            background-repeat: no-repeat; /* Do not repeat the image */            background-repeat: no-repeat; /* Do not repeat the image */   background-image: url('assets/images/mbr-1920x1276.jpg'); /* Set background image */
        background-size: cover; /* Cover the entire screen */
        background-repeat: no-repeat; /* Do not repeat the image */
          opacity: 70%; /* Adjust opacity */

        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
        }

        h1 {
            color: white;
            text-align: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 15px;
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
            padding: 8px 8px;
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
    <br><br><br><br><br><br><br><br><br><center><h1>Staff Order Management</h1>
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
            // Connect to your database
            $conn = new mysqli('localhost', 'root', '', 'ufo');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch order data
            $sql = "SELECT * FROM orders";
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
    echo "<td>Pending</td>"; // Set status to "Pending"
    echo "<td>
            <button class='btn action-btn remove-btn' onclick='removeOrder(this)'>
                    <img src='assets/images/remove.jpg' alt='Remove' style='width:50px;height:50px;'>
                </button>
                <button class='btn action-btn edit-btn' onclick='acceptOrder(this)'>
                    <img src='assets/images/accept.jpg' alt='Accept' style='width:50px;height:50px;'>

          </td>";
    echo "</tr>";
}

            } else {
                echo "<tr><td colspan='9'>No orders found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

     <script>
        // JavaScript functions to edit and remove orders
        function editOrder(button) {
            // Implement functionality to edit order
            // Example: window.location.href = 'edit_order.php?order_id=' + orderId;
        }

        function removeOrder(button) {
            // Implement functionality to remove order
            if (confirm("Are you sure you want to remove this order?")) {
                // Logic to remove the order from the table
                var row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
                // Additional logic to delete the order from the database if necessary
            }
        }
        function removeOrder(button) {
    if (confirm("Are you sure you want to remove this order?")) {
        var orderId = button.parentNode.parentNode.cells[0].textContent.trim();
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                    alert("Order removed successfully!");
                } else {
                    alert("Failed to remove order. Please try again later.");
                }
            }
        };
        xhr.open("GET", "remove_order.php?order_id=" + orderId, true);
        xhr.send();
    }
}
function acceptOrder(button) {
    if (confirm("Are you sure you want to accept this order?")) {
        var orderId = button.parentNode.parentNode.cells[0].textContent.trim();
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                    alert("Order accepted and saved successfully!");
                } else {
                    alert("Failed to accept order. Please try again later.");
                }
            }
        };
        xhr.open("GET", "accept_order.php?order_id=" + orderId, true);
        xhr.send();
    }
}


    </script>

</body>
</html>
