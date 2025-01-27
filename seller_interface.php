<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Site made with Mobirise Website Builder v5.9.8, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.8, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/2121.png" type="image/x-icon">
    <meta name="description" content="">
    <title>Seller Interface</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/animatecss/animate.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .editable {
            border: 1px solid #ddd;
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .update-btn,
        .add-btn {
            background-color: #4caf50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-row-btn {
            margin-bottom: 10px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Seller Product Management</h1>

    <form method="post" action="update_product.php" id="productForm" enctype="multipart/form-data">
        <!-- Add Product button to add a new row -->
     
        <table id="productTable">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Existing rows loaded from the database -->
                <?php
                // Assuming you have a PHP script to fetch data from the database
                // Replace 'YOUR_DB_CONNECTION_DETAILS' with your actual database details
                $conn = new mysqli('localhost', 'root', '', 'ufo');
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['product_id'] . '</td>';
                        echo '<td><input class="editable" type="text" name="product_name[]" value="' . $row['product_name'] . '"></td>';
                        echo '<td><input class="editable" type="text" name="price[]" value="' . $row['price'] . '"></td>';
                        echo '<td>';
                        echo '<img src="' . $row['image'] . '" alt="Product Image" style="max-width: 100px; max-height: 100px;">';
                        echo '<input class="editable" type="file" name="image[]" accept="image/*"></td>';
                        echo '<td><input class="editable" type="text" name="status[]" value="' . $row['status'] . '"></td>';
                        echo '<td>';
                        echo '<button type="submit" class="update-btn" name="update[]" value="' . $row['product_id'] . '">Update</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
                <!-- New row for adding a new product -->
                <tr class="hidden" id="new-row">
                    <td>New</td>
                    <td><input class="editable" type="text" name="new_product_name[]"></td>
                    <td><input class="editable" type="text" name="new_price[]"></td>
                    <td><input class="editable" type="file" name="new_image[]" accept="image/*"></td>
                    <td><input class="editable" type="text" name="new_status[]"></td>
                    <td><button type="button" class="add-btn" onclick="addRow()">Add</button></td>
                </tr>
            </tbody>
        </table>

        <input type="submit" value="Save Changes">
    </form>

    <script>
        function addRow() {
            // Toggle display of the new row
            const newRow = document.getElementById('new-row');
            newRow.classList.toggle('hidden');
        }
    </script>
    
</body>

</html>
