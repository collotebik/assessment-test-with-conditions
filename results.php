<!DOCTYPE html>
<html>
<head>
  <title>Order Results</title>
  <style>
    .section {
      border: 1px solid #ccc;
      margin-bottom: 10px;
      padding: 10px;
      cursor: pointer;
    }
    
    .section-content {
      display: none;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.section').click(function() {
        $(this).find('.section-content').slideToggle();
      });
    });
  </script>
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

    // Retrieve the order status, name, email, phone, and opinions from the database
    $sql = 'SELECT * FROM order_status';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="section">';
            echo '<h3>Order ID: ' . $row['client'] . ' - Status: ' . $row['status'] . '</h3>';
            echo '<div class="section-content">';
            echo '<p><strong>Name:</strong> ' . $row['name'] . '</p>';
            echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
            echo '<p><strong>Phone:</strong> ' . $row['phone'] . '</p>';
            echo '<p><strong>Opinions:</strong></p>';
            
            // Output each opinion
            for ($i = 1; $i <= 17; $i++) {
                $opinionColumn = 'opinion' . $i;
                $opinionValue = $row[$opinionColumn];
                if (!empty($opinionValue)) {
                    echo '<p><strong>Opinion ' . $i . ':</strong> ' . $opinionValue . '</p>';
                }
            }
            
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No order results found.';
    }

    // Close the database connection
    $conn->close();
  ?>
</body>
</html>
