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

// Get the email, name, and phone from the AJAX request
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];

// Update the 'email_sent' column for the given email
$sql = "UPDATE order_status SET email_sent = 1 WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    // Log the update success or perform any additional actions
    echo 'Email sent status updated successfully';
} else {
    // Log the update failure or handle the error
    echo 'Error updating email sent status: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
