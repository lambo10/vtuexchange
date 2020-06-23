<?php

include'connect.php';

$sql = "CREATE TABLE users (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30),
email VARCHAR(30),
phone VARCHAR(30),
AccBalance TEXT DEFAULT 0,
password VARCHAR(30),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
