<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username from the request
if (isset($_POST['username'])) {
    $inputUsername = trim($_POST['username']);

    // Query the database to check if the username exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE userid = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->store_result();

    // Check if username exists
    if ($stmt->num_rows > 0) {
        echo "available";
    } else {
        echo "not-available";
    }

    $stmt->close();
}

$conn->close();
?>
