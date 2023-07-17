<!DOCTYPE html>
<html>
<head>
  <title>Good Enough Users</title>
</head>
<body>
  <h1>Good Enough Users</h1>

  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Retrieve the submitted data
      $email = $_POST['email'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];

      // Display the received data
      echo '<p><strong>Name:</strong> ' . $name . '</p>';
      echo '<p><strong>Email:</strong> ' . $email . '</p>';
      echo '<p><strong>Phone:</strong> ' . $phone . '</p>';

      // Perform any additional actions or logic as needed
    }
  ?>
</body>
</html>
