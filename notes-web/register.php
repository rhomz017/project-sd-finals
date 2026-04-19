<?php
include 'db.php';

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if($conn->query($sql)){
        $success = "Registered successfully. You can now login.";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body class="register">

<div class="login-box">
    <h2>Create Account</h2>

    <?php if(isset($success)) echo "<div class='success'>$success</div>"; ?>
    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>

    <a href="login.php">Already have an account? Login</a>
</div>

</body>
</html>