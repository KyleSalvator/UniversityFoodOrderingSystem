<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['userType'])) {
    // If user is not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// Ensure only students can access this page
if ($_SESSION['userType'] !== 'student') {
    // Redirect non-students to the appropriate page
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

    <title>UFO Menu</title>
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
            background-repeat: no-repeat; /* Do not repeat the image */
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
    
    #total-section {
      position: fixed;
      bottom: 10px;
      right: 10px;
      background-color: #fff;
      padding: 10px;
      border: 1px solid #ccc;
      font-size: 29px; /* Adjust the font size as needed */
    }
    .item {
      margin-bottom: 20px;
    }
    .card-box {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
    }
    .card-title {
      margin-top: 0;
    }
    .price {
      margin-bottom: 10px;
    }
    .btn-primary {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>

</head>
<body>
  
<section data-bs-version="5.1" class="menu menu5 cid-tY2kb0oEHR" once="menu" id="menu05-2d">
  <div id="total-section">Total: ₱0.00</div>

  <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
    <div class="container">
      <div class="navbar-brand">
        <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" >UFO</a></span>
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
            <a class="nav-link link text-black display-4" href="#">Main Item</a>
          </li>
          <li>
            <a class="nav-link link text-black display-4" id="proceedToPaymentBtn" href="#">Proceed to Payment</a>
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

<section data-bs-version="5.1" class="features9 cid-tY2jY6IQvq" xmlns="http://www.w3.org/1999/html" id="features9-2c">
  <div class="container">
    <?php
      // Connect to your database and fetch product data
      $conn = new mysqli('localhost', 'root', '', 'ufo');

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
    ?>
              <div class="item features-image">
                <div class="item-wrapper">
                  <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                      <div class="image-wrapper">
                        <img src="<?php echo $row['image']; ?>" alt="Product Image" data-slide-to="1" data-bs-slide-to="1">
                      </div>
                    </div>
                    <div class="col-12 col-md">
                      <div class="row">
                        <div class="col-md">
                          <h6 class="card-title mbr-fonts-style display-5"><strong><?php echo $row['product_name']; ?></strong></h6>
                          <p class="mbr-text mbr-fonts-style display-7"><?php echo $row['description']; ?></p>
                        </div>
                        <div class="col-md-auto">
                          <p class="price mbr-fonts-style display-2">₱<?php echo $row['price']; ?></p>
                          <p class="mbr-text mbr-fonts-style display-7">Status: <?php echo $row['status']; ?></p>
                          <div class="mbr-section-btn">
    <a href="#" class="btn btn-primary display-4 add-to-cart-btn <?php echo ($row['status'] == 'UNAVAILABLE' ? 'disabled' : ''); ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['product_name']; ?>" style="background-color: <?php echo ($row['status'] == 'UNAVAILABLE' ? 'red !important' : ''); ?>">
        <?php echo ($row['status'] == 'UNAVAILABLE' ? 'Unavailable' : 'Add'); ?>
    </a>
    <a href="#" class="btn btn-danger display-4 remove-from-cart-btn" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['product_name']; ?>">Minus</a>
</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    <?php
          }
      } else {
          echo "<div class='alert alert-warning' role='alert'>No products found</div>";
      }

      $conn->close();
    ?>
  </div>
</section>

<div id="order-list"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    var removeFromCartButtons = document.querySelectorAll('.remove-from-cart-btn');
    var totalSection = document.getElementById('total-section');
    var total = 0;
    var orders = [];

    // Function to update total and order list
    function updateTotalAndOrders() {
        total = orders.reduce((acc, curr) => acc + curr.price, 0);
        totalSection.innerText = 'Total: ₱' + total.toFixed(2);
    }

    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var price = parseFloat(button.getAttribute('data-price'));
            var name = button.getAttribute('data-name');
            orders.push({name: name, price: price});
            updateTotalAndOrders();
        });
    });

    removeFromCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var price = parseFloat(button.getAttribute('data-price'));
            var name = button.getAttribute('data-name');
            var index = orders.findIndex(order => order.name === name && order.price === price);
            if (index !== -1) {
                orders.splice(index, 1);
                updateTotalAndOrders();
            }
        });
    });

    // Proceed to Payment button click event
    document.getElementById('proceedToPaymentBtn').addEventListener('click', function() {
        var nextPageUrl = 'page7.php?';
        orders.forEach(function(order, index) {
            nextPageUrl += 'product' + (index + 1) + '=' + encodeURIComponent(order.name) + '&';
            nextPageUrl += 'price' + (index + 1) + '=' + encodeURIComponent(order.price.toFixed(2)) + '&';
        });
        nextPageUrl += 'total=' + encodeURIComponent(total.toFixed(2));

        window.location.href = nextPageUrl;
    });
});
    document.getElementById('proceedToPaymentBtn').addEventListener('click', function() {
    var nextPageUrl = 'page7.php?';
    orders.forEach(function(order, index) {
        nextPageUrl += 'product' + (index + 1) + '=' + encodeURIComponent(order.name) + '&';
        nextPageUrl += 'price' + (index + 1) + '=' + encodeURIComponent(order.price.toFixed(2)) + '&';
    });
    nextPageUrl += 'total=' + encodeURIComponent(total.toFixed(2));

    window.location.href = nextPageUrl;
});

</script>

<script src="assets/ytplayer/index.js"></script>
<script src="assets/dropdown/js/navbar-dropdown.js"></script>
<script src="assets/theme/js/script.js"></script>
<input name="animation" type="hidden">
</body>
</html>
