<?php
session_start();
include 'db_connect.php';

$message = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "Username already exists!";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful! You can now login.";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register New User</h1>

        <?php if ($message != "") { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>

        <form method="post" action="register.php">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" name="register" value="Register">
        </form>

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
