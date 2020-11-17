<?php

include'connect.php';
session_start();
$email = $_SESSION["email"];

$handle2 = "SELECT accType FROM users WHERE email='$email'";
      $result2 = $conn->query($handle2);
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {
            $accType = $row["accType"];
            $handle = "SELECT instruction_or_data FROM site_operation_var WHERE operation_name='$accType' LIMIT 1";
            $result = $conn->query($handle);
            if ($result->num_rows > 0) {
                while($row2 = $result->fetch_assoc()) {
                  $output = $row2["instruction_or_data"];
                  echo $output;
                }
            }else{
              echo 0;
            }
          }
        }else{
          echo 0;
        }
    

?>