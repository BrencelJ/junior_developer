<?php
  // Connect to database
  $servername = "localhost";
  $username = "carDeal";
  $password = "carDeal123";
  $dbname = "car_dealership";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>
