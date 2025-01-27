<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.8, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/2121.png" type="image/x-icon">
    <meta name="description" content="">
  
    <title>UFO Admin Dashboard</title>
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
    <style>
        /* Add your CSS styles here */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #black;
        }

        .background-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('assets/images/mbr-1432x953.jpg') center center/cover;
            z-index: -1;
            animation: backgroundAnimation 20s infinite;
        }

        @keyframes backgroundAnimation {
            0% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
            100% { opacity: 0.5; transform: scale(1); }
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 60px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            opacity: 75%;
        }

        h1 {
            color: #0066cc;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card {
            flex: 1 1 300px;
            padding: 10px;
            border-radius: 60px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease-out;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 102, 204, 0.8), rgba(0, 150, 136, 0.8));
            z-index: -1;
        }

        .dashboard-card h2 {
            margin-bottom: 5px;
            font-size: 1.5em;
            color: #black;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .count {
            font-size: 2em;
            margin-top: 5px;
            color: #black;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .icon {
            font-size: 3em;
            margin-bottom: 10px;
            color: #fff;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .spaceship {
            animation: spaceshipAnimation 2s ease-in-out infinite alternate;
        }

        @keyframes spaceshipAnimation {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
    </style>
</head>
<a href="index.php"><img  class="spaceship"  src="assets/images/ufo.png" alt="Spaceship" style="width: 100px;" >
</a>
<body>    <div class="background-pattern"></div>
    <div class="container">
        <h1>Admin Dashboard</h1>
        
        <div class="dashboard-card">
            <i class="fas fa-user-shield icon"></i>
            <a href="admin1.php" style="text-decoration: none; color: inherit;">
 <h2>Total Admins</h2>
            <p class="count">

                <?php
                // Connect to your database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ufo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch total admin users
                $sql = "SELECT COUNT(*) AS total_admins FROM users WHERE Type = 'admin'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row["total_admins"];
                } else {
                    echo "0";
                }

                $conn->close();

                ?> 
            </p></a>
        </div>
        
        <div class="dashboard-card">
            <i class="fas fa-user-tie icon"></i>
                        <a href="admin2.php" style="text-decoration: none; color: inherit;">
            <h2>Total Staff</h2>
            <p class="count">
                <?php
                // Connect to your database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ufo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch total staff users
                $sql = "SELECT COUNT(*) AS total_staff FROM users WHERE Type = 'staff'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row["total_staff"];
                } else {
                    echo "0";
                }

                $conn->close();
                ?>
            </p></a>
        </div>
        
        <div class="dashboard-card">
            <i class="fas fa-user-graduate icon"></i>

                        <a href="admin3.php" style="text-decoration: none; color: inherit;">

            <h2>Total Users</h2>
            <p class="count">
                <?php
                // Connect to your database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ufo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch total student users
                $sql = "SELECT COUNT(*) AS total_students FROM users WHERE Type = 'student'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row["total_students"];
                } else {
                    echo "0";
                }

                $conn->close();
                ?>

            
            </p></a>
        </div>
         <div class="dashboard-card">

                        <a href="admin4.php" style="text-decoration: none; color: inherit;">

            <i class="fas fa-user-graduate icon"></i>
            <h2>Total Menu</h2>
            <p class="count">
                <?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ufo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch total count of product names
$sql = "SELECT COUNT(product_name) AS total_product_count FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["total_product_count"];
} else {
    echo "0";
}

$conn->close();
?>

       </p>
           
   </div></a>
   <div class="dashboard-card">
            <i class="fas fa-user-graduate icon"></i>
             <a href="admin5.php" style="text-decoration: none; color: inherit;">

            <h2>Total Order</h2>
            <p class="count">
                <?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ufo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch total count of product names
$sql = "SELECT COUNT(email) AS total_product_count FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["total_product_count"];
} else {
    echo "0";
}

$conn->close();
?>

       </p></a>
   </div>
   <div class="dashboard-card">
            <i class="fas fa-user-graduate icon"></i><a href="admin6.php" style="text-decoration: none; color: inherit;">

            <h2>Total On Process</h2>
            <p class="count">
                <?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ufo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch total count of product names
$sql = "SELECT COUNT(email) AS total_product_count FROM ss";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["total_product_count"];
} else {
    echo "0";
}

$conn->close();
?> </p> </a>
      </div>
<div class="dashboard-card">
            <i class="fas fa-user-graduate icon"></i>
            <a href="admin7.php" style="text-decoration: none; color: inherit;">
            <h2>Total of Paid Picked Up </h2>
            <p class="count">
                <?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ufo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch total count of product names
$sql = "SELECT COUNT(email) AS total_product_count FROM to_deliver WHERE Paid_By = 'Paid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["total_product_count"];
} else {
    echo "0";
}

$conn->close();
?>
   

       </p></a>
   
   </div>



    </div>
<div class="container">
    <h1 id="date" class="fadeIn"></h1>
    <p id="time" class="fadeIn"></p>
</div>

<script>
    function displayDateTime() {
        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const currentDate = new Date();
        const currentDay = days[currentDate.getDay()];
        const currentMonth = months[currentDate.getMonth()];
        const currentYear = currentDate.getFullYear();
        const currentDateOfMonth = currentDate.getDate();
        const currentTime = currentDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        
        const dateElement = document.getElementById('date');
        const timeElement = document.getElementById('time');
        
        dateElement.textContent = "Current date: " + currentDay + ", " + currentMonth + " " + currentDateOfMonth + ", " + currentYear;
        timeElement.textContent = "Current time: " + currentTime;
    }

    // Call the function to display date and time
    displayDateTime();
</script>
</body>
</html>
