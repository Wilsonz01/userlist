<?php
// Database 
$host = 'localhost'; 
$dbname = 'usersb'; 
$username = 'root'; 
$password = ''; 

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
