<?php

include'connect.php';

$sql = "CREATE TABLE services (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
network VARCHAR(30),
cost VARCHAR(30),
type TEXT,
validity VARCHAR(30),
serviceType VARCHAR(30),
extAPI_ID TEXT,
check_balance TEXT,
date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table services created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
