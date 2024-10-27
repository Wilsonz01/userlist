<?php
include('dbconnection.php'); 

// Initialize variables
$id= '';
$username = '';
$email = '';

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; 

    // Fetch user 
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username, $email);
    $stmt->fetch();
    $stmt->close();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update User</h1>
        <form method="post" action="manageuser.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"> 
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            

            <button type="submit" name="update">Update User</button>
        </form>
    </div>
</body>
</html>
