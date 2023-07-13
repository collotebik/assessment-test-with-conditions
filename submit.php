<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$dbUsername = 'collo'; // Replace with your database username
$dbPassword = 'deanna21'; // Replace with your database password
$dbName = 'collo'; // Replace with your database name

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve the order status from the request
$orderStatus = $_POST['status'];

// Insert the order status into the database
$sql = "INSERT INTO order_status (status) VALUES ('$orderStatus')";
if ($conn->query($sql) === true) {
    echo 'Order status submitted successfully.';
} else {
    echo 'Error: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
