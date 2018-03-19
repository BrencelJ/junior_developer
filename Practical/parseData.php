<?php
  include_once("dbConnection.php"); // Include MySQL login information

  // Get website and split it into lines
  $html = file_get_contents("https://admin.b2b-carmarket.com//test/project");
  $lines = explode("<br>",$html);
  unset($lines[0]); // remove first line because we don't need it

  // Go through the lines and store them into database
  foreach ($lines as $line) {
    $allData = explode(",",$line);
    $vehicleID = $allData[0];
    $inhouseSellerID = $allData[1];
    $buyerID = $allData[2];
    $modelID = $allData[3];
    $saleDate = $allData[4];
    $buyDate = $allData[5];
    $sql = "INSERT INTO deals (vehicleID, inhouseSellerID, buyerID, modelID, saleDate, buyDate) VALUES ($vehicleID, $inhouseSellerID, $buyerID, $modelID, '$saleDate', '$buyDate')";
    if ($conn->query($sql) === FALSE) { echo "Error: " . $sql . "<br>" . $conn->error; }
  }
?>
