<!DOCTYPE html>
<html>
<head>
  <title>Not Good Enough Users</title>
</head>
<body>
  <h1>Not Good Enough Users</h1>
  
  <?php
    // Retrieve the user details from the query parameters
    $orderID = $_GET['orderID'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    
    // Display the user details
    echo '<p><strong>Order ID:</strong> ' . $orderID . '</p>';
    echo '<p><strong>Name:</strong> ' . $name . '</p>';
    echo '<p><strong>Email:</strong> ' . $email . '</p>';
    echo '<p><strong>Phone:</strong> ' . $phone . '</p>';
    
    // Perform any additional actions for "Not Good Enough" users
    // ...
  ?>
  
</body>
</html>
