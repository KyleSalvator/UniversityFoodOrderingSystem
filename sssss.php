<?php
// Check if the form is submitted
if(isset($_POST['submit'])){
    // Retrieve form data
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    
    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, image, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdis", $productName, $description, $price, $image, $status);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
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
  <title>Seller Interface</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #0066cc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #4caf50;
            color: white;
        }

        .remove-btn {
            background-color: #f44336;
            color: white;
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
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" >UFO Staff Interface</a></span>
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
                    <li>
                        <a class="nav-link link text-black display-4" id="proceedToPaymentBtn">Payment</a>
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
<br><br><br><br><br><br>
<center><strong><h1>Staff Product Management</h1></strong></center>
<?php
// Check if the form is submitted for adding a new product
if(isset($_POST['submit'])){
    // Retrieve form data
    // Code for adding a new product goes here
}

// Check if the form is submitted for deleting a product
if(isset($_POST['delete'])){
    // Retrieve product ID to be deleted
    $productId = $_POST['product_id'];

    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement for deleting a product
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $productId);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<table>
    <thead>
        <tr><center>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
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
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td><span class='editable' data-field='product_name' data-id='" . $row["product_id"] . "'>" . $row["product_name"] . "</span></td>";
                echo "<td><span class='editable' data-field='description' data-id='" . $row["product_id"] . "'>" . $row["description"] . "</span></td>";
                echo "<td><span class='editable' data-field='price' data-id='" . $row["product_id"] . "'>" . $row["price"] . "</span></td>";
                echo "<td><span class='editable' data-field='image' data-id='" . $row["product_id"] . "'>" . $row["image"] . "</span></td>";
                echo "<td><span class='editable' data-field='status' data-id='" . $row["product_id"] . "'>" . $row["status"] . "</span></td>";
                echo "<td>
                        <button class='btn edit-btn' onclick='editRow(this)'>Edit</button>
                        <button class='btn remove-btn' onclick='removeRow(this)'>Remove</button>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No products found</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table> 

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <center><button type="submit" class="btn btn-primary add-menu-btn" name="submit">Add Menu</button></center>
</form>

<script>
    function editRow(button) {
        const row = button.closest('tr');
        const fields = row.querySelectorAll('.editable');

        fields.forEach(field => {
            const input = document.createElement('input');
            input.value = field.textContent.trim();
            field.textContent = '';
            if (field.dataset.field === 'image') {
                // For the image field, create an input field of type file
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'image/*';
                field.appendChild(fileInput);
            } else {
                // For other fields, create regular input fields
                field.appendChild(input);
            }
        });

        button.textContent = 'Save';
        button.classList.remove('edit-btn');
        button.classList.add('save-btn');
        button.onclick = () => saveRow(button);
    }

    function saveRow(button) {
        const row = button.closest('tr');
        const fields = row.querySelectorAll('.editable');

        const formData = new FormData();
        fields.forEach(field => {
            if (field.dataset.field === 'image') {
                // For the image field, append the file from the input field
                const fileInput = field.querySelector('input[type="file"]');
                formData.append(field.dataset.field, fileInput.files[0]);
            } else {
                const value = field.querySelector('input').value;
                formData.append(field.dataset.field, value);
            }
        });

        const productId = fields[0].dataset.id;
        formData.append('product_id', productId);

        fetch('update_product.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the table cell values with the edited data
                fields.forEach(field => {
                    if (field.dataset.field !== 'image') {
                        const value = field.querySelector('input').value;
                        field.textContent = value;
                    } else {
                        // For the image field, update with the appropriate image URL
                        const imageURL = data.image_url; // Assuming update_product.php returns the image URL
                        const img = document.createElement('img');
                        img.src = imageURL;
                        img.alt = 'Product Image';
                        img.style.maxWidth = '100px';
                        img.style.maxHeight = '100px';
                        field.textContent = '';
                        field.appendChild(img);
                    }
                });

                button.textContent = 'Edit';
                button.classList.remove('save-btn');
                button.classList.add('edit-btn');
                button.onclick = () => editRow(button);
            } else {
                throw new Error('Failed to save changes');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to save changes. Please try again.');
        });
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>
</body>
</html>
