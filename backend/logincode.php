<?php
include ('../dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        header("Location: ../dashboard.php");
       
    } else {
        
        echo "Invalid username or password.";
    }
}

$conn->close();
?>