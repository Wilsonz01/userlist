<?php
include('dbconnection.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="assets/dashboard.css">
</head>
<body>
<form method="post" action="Login.php">
        <div class="header">
            <button class="lg-btn">Logout</button>
        </div>
           
    </form>
    <div class="container">
        <h1>User's List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>create_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td> 
                               <a href="update.php?id=<?php echo $row['id']; ?>"class="update-button">update</a>
                               <a href="manageuser.php?fc=delete&id=<?php echo $row['id']; ?>" class="delete-button">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php $conn->close(); ?>
   
</body>
</html>
