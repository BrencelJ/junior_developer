<?php
  include_once("dbConnection.php"); // Include MySQL login information
  $names = ["Luka", "Nik", "Žan", "Jakob", "Filip", "Žiga", "Jan", "Nejc", "Mark", "Jaka",
            "Eva", "Sara", "Lara", "Lana", "Ema", "Nika", "Ana", "Zala", "Neža", "Julija"];

  $surnames = ["Novak", "Horvat", "Kovačič", "Krajnc", "Zupančič", "Potočnik", "Kovač", "Mlakar",
               "Kos", "Vidmar", "Golob", "Turk", "Kralj", "Božič", "Korošec", "Bizjak", "Zupan",
               "Hribar", "Kotnik", "Kavčič"];
  $fullNames = [];
  $buyerIDs = [];
  $buyerIDNumbers = $fullNamesNumers = 0;

  // Create array with all the names possibles
  foreach ($surnames as $surname) {
    foreach ($names as $name) {
      $fullNames += [$fullNamesNumers++ => "$name $surname"];
    }
  }

  // Get all of the buyerID's and sort them from low to high
  $sql = "SELECT DISTINCT buyerID FROM deals;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $buyerIDs += [$buyerIDNumbers++ => $row["buyerID"]];
    }
  }
  sort($buyerIDs);

  // Randomly select the names aout of the array and shuffle them
  $randomFullNamesNumbers = array_rand($fullNames,count($buyerIDs));
  shuffle($randomFullNamesNumbers);

  // Store the names and buyerID into database
  for ($i=0; $i<count($buyerIDs); $i++){
    $fullName = $fullNames[$randomFullNamesNumbers[$i]];
    $splitFullName = explode(" ", $fullName);
    $nameStore = $splitFullName[0];
    $surnameStore = $splitFullName[1];
    $buyerID = $buyerIDs[$i];
    $sql = "INSERT INTO buyers (buyerID, name, surname) VALUES ('$buyerID', '$nameStore', '$surnameStore')";
    if ($conn->query($sql) === FALSE) { echo "Error: " . $sql . "<br>" . $conn->error; }
  }
?>
