<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ufo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the to_deliver table
$sql = "SELECT * FROM to_deliver";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["total_price"] . "</td>";
        echo "<td>" . $row["payment_method"] . "</td>";
        echo "<td>" . $row["status"] . "</td>"; // Display status from the database
        echo "<td>
            <button class='btn cancel-btn' data-order-id='" . $row["order_id"] . "'>Cancel</button>
            <button class='btn done-btn' data-order-id='" . $row["order_id"] . "'>Done</button>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No orders found</td></tr>";
}

$conn->close();
?>
