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

    .action-buttons {
      display: none;
      margin-top: 10px;
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
    
    .admin-content h1 {
      margin-top: 0;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.section').click(function() {
        $(this).find('.section-content').slideToggle();
        $(this).find('.action-buttons').toggle();
      });

      $('.sort-button').click(function(e) {
        e.stopPropagation();
        var sectionContent = $(this).closest('.section').find('.section-content');
        var status = $(this).data('status');
        var email = sectionContent.find('.email').text();
        var name = sectionContent.find('.name').text();
        var phone = sectionContent.find('.phone').text();

        // Send an email if the status is not good enough
        if (status === 'not-good-enough') {
          window.location.href = 'mailto:' + email;
          
          // Update the email_sent column in the database
          $.ajax({
            url: 'update_email_sent.php',
            type: 'POST',
            data: {
              email: email,
              name: name,
              phone: phone
            },
            success: function(response) {
              console.log(response);
            },
            error: function(xhr, status, error) {
              console.log(error);
            }
          });
        }

        // Perform sorting logic or actions as needed

        // Update the section content based on the sorted status
        sectionContent.css('background-color', status === 'good-enough' ? '#c9ffc9' : '#ffc9c9');
      });
    });
  </script>
</head>
<body>
  <div class="admin-panel">
    <ul>
      <li><a href="#orders">Orders</a></li>
      <li><a href="sent_email_users.php" target="_blank">Sent Email Users</a></li>
      <li><a href="#good-enough">Good Enough</a></li>
    </ul>
  </div>

  <div class="admin-content">
    <h1>Admin Dashboard</h1>
    
    <section id="orders">
      <h2>Order Results</h2>
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
                echo '<button class="sort-button" data-status="good-enough">Good Enough</button>';
                echo '<button class="sort-button" data-status="not-good-enough">Not Good Enough</button>';
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
    </section>
    
    <section id="sent-email">
      <h2>Sent Email</h2>
      <!-- PHP code to retrieve and display users who have been sent an email -->
    </section>
    
    <section id="good-enough">
      <h2>Good Enough</h2>
      <!-- PHP code to retrieve and display users marked as good enough without sending an email -->
    </section>
  </div>
</body>
</html>
