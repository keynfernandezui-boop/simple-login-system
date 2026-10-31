<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $id = mysqli_real_escape_string($conn, $id);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "UPDATE users SET username = '$username', password = '$password' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: user_list.php");
        exit();
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <?php if ($message != "") { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>

        <form method="post" action="edit_user.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Username: <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br><br>
            Password: <input type="text" name="password" value="<?php echo $row['password']; ?>" required><br><br>
            <input type="submit" name="update" value="Update">
        </form>

        <p><a href="user_list.php">Back to User List</a></p>
    </div>
</body>
</html>
