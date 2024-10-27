<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-up</title>
    <link rel="stylesheet" href="assets/register.css">
</head>
<body>
    <div class="sign-up-container">
        <h2>Sign Up</h2>
        <form action="backend/registrationcode.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="checkbox" onclick="myFunction()">Show Password

            <button type="submit" name="btn_signup">Sign Up</button>
            <a href="Login.php">Back to login</a>
        </form>
    </div>
</body>
<script>
    function myFunction() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>
