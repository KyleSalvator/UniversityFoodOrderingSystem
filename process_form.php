<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic validation
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill out all fields.";
        header("Location: ss.php");
        exit();
    } else {
        // Database connection details
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "ufo";

        // Create a database connection
        $conn = new mysqli($host, $user, $pass, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user inputs to prevent SQL injection
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, fetch user data
            $row = $result->fetch_assoc();
            $userType = $row['Type'];

            // Store user data in session variables
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['userType'] = $userType;

            // Redirect based on user type
            if ($userType === 'student') {
                header("Location: page5.php");
            } elseif ($userType === 'admin') {
                header("Location: admin.php");
            } elseif ($userType === 'staff') {
                header("Location: gg.php");
            } else {
                echo "Invalid user type.";
            }
        } else {
            echo "Incorrect username or password.";
            header("Location: inco.php");
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // If the form is not submitted through POST method, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
