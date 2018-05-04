<?php

function connect_and_select_db()
  {
    $server = '127.0.0.1'; // database server
    $username = 'root'; // Database username
    $pwd = ''; // Database password
    $dbname = 'ecebond'; // Database name
      
      $conn = mysqli_connect($server, $username, $pwd, $dbname);
  
      if (!$conn) {
          echo "Unable to connect to DB: " . mysqli_connect_error();
              exit;
      }
      
      // Select the database	
      $dbh = mysqli_select_db($conn, $dbname);
      if (!$dbh){
              echo "Unable to select ".$dbname.": " . mysqli_connect_error();
          exit;
      }

      return $conn;
  }
?>

