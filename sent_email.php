<!DOCTYPE html>
<html>
<head>
  <title>Sent Email Users</title>
</head>
<body>
  <h1>Sent Email Users</h1>
  
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

// Enable error reporting for debugging purposes
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Retrieve the name, email, and phone of users marked as "Not Good Enough"
    $sql = "SELECT client, name, email, phone FROM order_status WHERE status = 'not-good-enough'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>Not Good Enough Users</h2>';
        echo '<table>';
        echo '<tr><th>Order ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['client'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No users marked as "Not Good Enough".';
    }
} catch (Exception $e) {
    echo 'Error retrieving data: ' . $e->getMessage();
}

// Close the database connection
$conn->close();
?>

  
</body>
</html>
