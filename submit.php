<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$dbUsername = 'collo'; // Replace with your database username
$dbPassword = 'deanna21'; // Replace with your database password
$dbName = 'collo'; // Replace with your database name

// Create a datab
// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve the order status and additional information from the request
$orderStatus = $_POST['status'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert the order status and additional information into the database
$sql = "INSERT INTO order_status (status, name, email, phone) VALUES ('$orderStatus', '$name', '$email', '$phone')";
if ($conn->query($sql) === true) {
    echo 'Order status and information submitted successfully.';
} else {
    echo 'Error: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
