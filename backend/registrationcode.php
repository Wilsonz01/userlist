<?php
include('../dbconnection.php');

// Check if form is submitted
if (isset($_POST['btn_signup'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $hashed_password = md5($password); // basic md5

        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            header('location:../Login.php');
        } else {
            // Log the error instead of displaying it
            error_log("SQL Error: " . $stmt->error);
            echo "Error signing up. Please try again.";
        }

        $stmt->close();
    }
}


$conn->close();
?>
