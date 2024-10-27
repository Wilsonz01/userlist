<?php
include ('dbconnection.php');

if(isset($_GET['fc'])){
    $fc = $_GET['fc'];
    if($fc=='delete'){
    
        $id = $_GET['id'];

    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("s", $id); 

    if ($stmt->execute()) {
        // Check if any row was deleted
        if ($stmt->affected_rows > 0) {
            header('location: dashboard.php');
        } else {
            echo "No user found with that username.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    }
}
if (isset($_POST['update'])) {
    $id = (int)$_POST['id']; 
    $name = $_POST['username'];
    $email = $_POST['email'];

    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        // Check if any row was updated
        if ($stmt->affected_rows > 0) {
            header('Location: dashboard.php');
            exit();
        } else {
            echo "No user found with that ID or no changes were made.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}






$conn->close();
?>
