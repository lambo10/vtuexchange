<?php

include'connect.php';

  $network = $_POST["network"];
  $serviceType = $_POST["serviceType"];
  $profit = $_POST["profit"];

  $sql = "INSERT INTO profits (network,serviceType,profit)
  VALUES ('$network','$serviceType','$profit')";
  
  if ($conn->query($sql) === TRUE) {
      echo "11111";
    }else{
        echo "100111";
    }
?>