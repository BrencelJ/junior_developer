<?php
  $directory = '.'; // You can sellect any directory containing ".js" files
  $bundledFileName = "bundledFiles"; // Name of a file to save all of ".js" files in to
  $arrayFiles = scandir($directory);
  foreach($arrayFiles as $file) {
    if (strpos($file, ".js") !== false ) {
      $openFile = fopen($file, "r") or die("Unable to open file!");
      if (!isset($bundleFiles)) $bundleFiles = fread($openFile,filesize("$file"));
      else $bundleFiles = $bundleFiles . fread($openFile,filesize("$file"));
      fclose($openFile);
    }
  }
  $createFile = fopen($bundledFileName . ".js", "w") or die("Unable to open file!");
  fwrite($createFile, $bundleFiles);
  fclose($createFile);
?>
