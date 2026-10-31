<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);

$sql = "DELETE FROM users WHERE id = '$id'";
mysqli_query($conn, $sql);

header("Location: user_list.php");
exit();
?>
