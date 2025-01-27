<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $schoolId = $_POST["school_id"];
    $email = $_POST["email"];

    // Validate form data (add more validation as needed)
    if (empty($name) || empty($username) || empty($password) || empty($schoolId) || empty($email)) {
        echo "Please fill out all fields";
        exit;
    }

    // TODO: Add additional validation and sanitation

    // Connect to your database (replace these values with your database credentials)
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ufo";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database (replace "users" with your actual table name)
    $sql = "INSERT INTO users (name, username, password, school_id, email) VALUES ('$name', '$username', '$password', '$schoolId', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location:xx.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
