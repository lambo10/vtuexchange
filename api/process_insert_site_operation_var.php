<?php

include'connect.php';

  $operation_name = $_POST["operation_name"];
  $instruction_or_data = $_POST["instruction_or_data"];

  $sql = "INSERT INTO site_operation_var (operation_name,instruction_or_data)
  VALUES ('$operation_name','$instruction_or_data')";
  
  if ($conn->query($sql) === TRUE) {
      echo "11111";
    }else{
        echo "100111";
    }
?>