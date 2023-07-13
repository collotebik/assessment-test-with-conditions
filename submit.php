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

// Retrieve the order status and form data from the request
$orderStatus = $_POST['status'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$opinion = $_POST['opinion'];

// Insert the order status and form data into the database
$sql = "INSERT INTO order_status (status, name, email, phone, opinion1, opinion2, opinion3, opinion4, opinion5, opinion6, opinion7, opinion8, opinion9, opinion10, opinion11, opinion12, opinion13, opinion14, opinion15, opinion16, opinion17)
        VALUES ('$orderStatus', '$name', '$email', '$phone', '$opinion[0]', '$opinion[1]', '$opinion[2]', '$opinion[3]', '$opinion[4]', '$opinion[5]', '$opinion[6]', '$opinion[7]', '$opinion[8]', '$opinion[9]', '$opinion[10]', '$opinion[11]', '$opinion[12]', '$opinion[13]', '$opinion[14]', '$opinion[15]', '$opinion[16]')";
if ($conn->query($sql) === true) {
    echo 'Order status and form data submitted successfully.';
} else {
    echo 'Error: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
