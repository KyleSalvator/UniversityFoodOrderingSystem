<?php
session_start();

// Replace these credentials with your database connection details
$db_host = 'your_database_host';
$db_name = 'ufo';
$db_user = 'your_database_user';
$db_password = 'your_database_password';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['name']; // Assuming the input field name is 'name'
        $password = $_POST['password'];

        // Validate credentials against the database
        $stmt = $pdo->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Authentication successful
            $_SESSION['username'] = $username;
            header('Location: dashboard.php'); // Redirect to the dashboard or another page
            exit();
        } else {
            // Authentication failed
            header('Location: index.php'); // Redirect back to the login page
            exit();
        }
    } else {
        // Redirect to the login page if accessed directly
        header('Location: index.php');
        exit();
    }
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}
?>
