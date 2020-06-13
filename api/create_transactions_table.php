<?php

include'connect.php';

$sql = "CREATE TABLE transactions (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userID VARCHAR(30),
cost VARCHAR(30),
type TEXT,
status TEXT,
output TEXT,
refID TEXT,
date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table transactions created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
