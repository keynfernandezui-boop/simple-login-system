<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT id, username, created_at FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container wide">
        <h1>All Registered Users</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Registered On</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
                    |
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <br>
        <p><a href="register.php">Add New User</a></p>
        <p><a href="dashboard.php">Back to Dashboard</a></p>
    </div>
</body>
</html>
