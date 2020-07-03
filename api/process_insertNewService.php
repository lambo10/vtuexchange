<?php

include'connect.php';

  $network = $_POST["network"];
  $cost = $_POST["cost"];
  $type = $_POST["type"];
  $validity = $_POST["validity"];
  $extAPI_ID = $_POST["extAPI_ID"];
  $serviceType = $_POST["serviceType"];

  $sql = "INSERT INTO services (network,cost,type,validity,extAPI_ID,serviceType)
  VALUES ('$network','$cost','$type','$validity','$extAPI_ID','$serviceType')";
  
  if ($conn->query($sql) === TRUE) {
      echo "11111";
    }else{
        echo "100111";
    }
?>