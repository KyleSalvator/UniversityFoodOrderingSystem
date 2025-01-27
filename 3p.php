<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Add New Menu</h1>
   
    <form action="process_menu.php" method="post" enctype="multipart/form-data">
        <!-- Form fields for adding a new menu item -->
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" min="0"><br>

        <label for="status">Status:</label><br>
        <div class="status-options">
            <input type="radio" id="available" name="status" value="AVAILABLE">
            <label for="available">AVAILABLE</label><br>
            <input type="radio" id="unavailable" name="status" value="UNAVAILABLE">
            <label for="unavailable">UNAVAILABLE</label><br>
        </div>

        <!-- Submit button -->
        <button type="submit" name="submit">Add</button>
    </form>

</body>
</html>
