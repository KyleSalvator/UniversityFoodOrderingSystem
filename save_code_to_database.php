<?php
// Suriin kung na-submit na ang form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kunin ang HTML code mula sa POST request
    $htmlCode = $_POST['pm.php'];

    // Konektahin sa database
    $conn = new mysqli('localhost', 'root', '', 'ufo');

    // Suriin ang koneksyon
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ihanda at i-bind ang SQL statement upang isama ang HTML code sa database
    $stmt = $conn->prepare("INSERT INTO ss (html_code) VALUES (?)");
    $stmt->bind_param("s", $htmlCode);

    // Ipapatupad ang statement
    if ($stmt->execute()) {
        echo 'HTML code saved successfully.';
    } else {
        echo 'Error occurred while saving HTML code.';
    }

    // Isara ang statement at koneksyon sa database
    $stmt->close();
    $conn->close();
}
?>
