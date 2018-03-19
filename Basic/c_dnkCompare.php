<?php
  $dnk = "HHHKLJ140L98IHYYYN";
  $suspects = ["John Novak" => ["Hair" => "Black",
                                "Eyes" => "Green",
                                "Race" => "Asian"],
               "Vin Diesel" => ["Hair" => "Blonde",
                                "Eyes" => "Brown",
                                "Race" => "Caucasian"],
               "Guy Fawkes" => ["Hair" => "Black",
                                "Eyes" => "Brown",
                                "Race" => "Hispanic"]
              ];
  $legend = ["Eyes" => ["Black" => "140L98",
                        "Green" => "140A98",
                        "Brown" => "140A88",
                        "Blue" => "140L97"],
             "Hair" => ["Brown" => "HHHKLJ",
                        "Black" => "HHHKLI",
                        "Blonde" => "HHLH1L",
                        "White" => "HHLH2L"],
             "Race" => ["Asian" => "1HYYYN",
                        "Hispanic" => "IHYYYN",
                        "Caucasian" => "IHYYNN"] // Sem spremenil v Caucasian ker je bilo v nalogi White
            ];
  $murderer = [];
  $suspectsMatch = [];

  foreach($legend as $keyType => $type){ // Creates murderers profile
    foreach ($type as $keyDnkType => $dnkType){
      if (strpos($dnk, $dnkType) !== false ) {
        $murderer += [$keyType => $keyDnkType];
      }
    }
  }

  foreach($suspects as $keySuspect => $suspect){ // Compares murderers profile with suspects
    $match = 0;
    foreach ($murderer as $keyType => $type) {
      if ($suspect[$keyType] == $type) $match += 1;
    }
    $percentageMatch = round(($match*100)/3,2);
    $suspectsMatch += [$keySuspect => $percentageMatch];
  }

  arsort($suspectsMatch);
  foreach($suspectsMatch as $name => $percentage){ // Writes out suspects by the % matched
    echo "DNK of <B>" . $name . "</B> is <B><I>" . $percentage . "%</I></B> match.<BR>";
  }

?>
