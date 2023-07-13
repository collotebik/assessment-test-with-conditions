<!DOCTYPE html>
<html>
<head>
  <title>Order Results</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>Order Results</h1>
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

    // Retrieve the order status from the database
    $sql = 'SELECT * FROM order_status';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Status</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No order results found.';
    }

    // Close the database connection
    $conn->close();
  ?>
</body>
</html>
