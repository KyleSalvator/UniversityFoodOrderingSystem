<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.9.8, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.9.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/2121.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Finalizing Bills</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="image01 cid-tY2PIwfhSF" id="image01-2f">
  

  
  </center>
        <h4 class="mbr-description mbr-fonts-style mb-3 align-center display-5"><strong>Totaling&nbsp;</strong></h4>
        <p class="mbr-description mbr-fonts-style mb-0 align-center display-7">In the context of an ordering system, "totaling" refers to the computation of the overall cost or quantity of selected items in a customer's order by summing up the individual prices or quantities. It is a crucial step in providing an accurate summary of the customer's chosen products and their associated costs.</p>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9">
        <div class="image-wrapper mb-4">
          
        </div><center><div class="container mt-5">
        <h2 class="mb-4">Finalize Bills</h2>

    <?php
    // Retrieve the order details from query parameters
    $total = isset($_GET['total']) ? $_GET['total'] : 0;
    $products = [];
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
        echo "<ul>";
        for ($i = 0; $i < count($products); $i++) {
            echo "<li>{$products[$i]} - ₱{$prices[$i]}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No orders found.</p>";
    }
    ?>       <a href="page7.php?total=<?php echo urlencode($total);  ?> " class="btn btn-primary mt-3">Proceed to Payment Method</a>

    </div>
    <script>
        // Proceed to Payment button click event
        document.getElementById('proceedToPaymentBtn').addEventListener('click', function() {
            var nextPageUrl = 'page7.php?';
            orders.forEach(function(order, index) {
                nextPageUrl += 'product' + (index + 1) + '=' + encodeURIComponent(order.name) + '&';
                nextPageUrl += 'price' + (index + 1) + '=' + encodeURIComponent(order.price.toFixed(2)) + '&';
            });
            nextPageUrl += 'total=' + encodeURIComponent(total.toFixed(2));

            window.location.href = nextPageUrl;
        });</script>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/ytplayer/index.js"></script>
    <script src="assets/theme/js/script.js"></script>

    <input name="animation" type="hidden">
    </div><br><br>
  </div> <center><button><a href="page5.php">Back </a></button></center>
</section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
  <input name="animation" type="hidden">
  </body>
</html>