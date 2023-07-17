<!DOCTYPE html>
<html>
<head>
  <title>Sent Email Users</title>
</head>
<body>
  <h1>Sent Email Users</h1>
  
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  
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

    // Retrieve the name, phone, and email of users who have been sent an email
    $sql = 'SELECT name, phone, email FROM order_status WHERE email_sent = 1';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Name</th><th>Phone</th><th>Email</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No users have been sent an email.';
    }

    // Close the database connection
    $conn->close();
  ?>
  
</body>
</html>
