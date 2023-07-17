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

    .admin-panel {
      position: fixed;
      left: 0;
      top: 0;
      width: 200px;
      height: 100%;
      background-color: #f2f2f2;
      padding: 20px;
    }
    
    .admin-panel ul {
      list-style-type: none;
      padding: 0;
    }
    
    .admin-panel li {
      margin-bottom: 10px;
    }
    
    .admin-panel a {
      text-decoration: none;
      color: #333;
    }
    
    .admin-content {
      margin-left: 220px;
      padding: 20px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.section').click(function() {
        $(this).find('.section-content').slideToggle();
      });

      $('.good-enough-button').click(function(e) {
        e.stopPropagation();
        var sectionContent = $(this).closest('.section').find('.section-content');
        var email = sectionContent.find('.email').text();
        var name = sectionContent.find('.name').text();
        var phone = sectionContent.find('.phone').text();

        // Send data to the Good Enough page
        $.ajax({
          url: 'good_enough.php',
          method: 'POST',
          data: { email: email, name: name, phone: phone },
          success: function(response) {
            console.log(response);
          }
        });
      });

      $('.not-good-enough-button').click(function(e) {
        e.stopPropagation();
        var sectionContent = $(this).closest('.section').find('.section-content');
        var email = sectionContent.find('.email').text();
        var name = sectionContent.find('.name').text();
        var phone = sectionContent.find('.phone').text();

        // Send data to the Not Good Enough page
        $.ajax({
          url: 'not_good_enough.php',
          method: 'POST',
          data: { email: email, name: name, phone: phone },
          success: function(response) {
            console.log(response);
          }
        });
      });
    });
  </script>
</head>
<body>
  <div class="admin-panel">
    <ul>
      <li><a href="results.php">Order Results</a></li>
      <li><a href="good_enough.php">Good Enough Users</a></li>
      <li><a href="not_good_enough.php">Not Good Enough Users</a></li>
    </ul>
  </div>

  <div class="admin-content">
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
              echo '<p class="name"><strong>Name:</strong> ' . $row['name'] . '</p>';
              echo '<p class="email"><strong>Email:</strong> ' . $row['email'] . '</p>';
              echo '<p class="phone"><strong>Phone:</strong> ' . $row['phone'] . '</p>';
              
              // Output each opinion
              for ($i = 1; $i <= 17; $i++) {
                  $opinionColumn = 'opinion' . $i;
                  $opinionValue = $row[$opinionColumn];
                  if (!empty($opinionValue)) {
                      echo '<p><strong>Opinion ' . $i . ':</strong> ' . $opinionValue . '</p>';
                  }
              }
              
              echo '<div class="action-buttons">';
              echo '<button class="good-enough-button">Good Enough</button>';
              echo '<button class="not-good-enough-button">Not Good Enough</button>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          echo 'No order results found.';
      }

      // Close the database connection
      $conn->close();
    ?>
  </div>
</body>
</html>
