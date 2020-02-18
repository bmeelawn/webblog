<?php
include 'db.inc.php';
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: ../index.php?fuck");
    exit();
}
$post_id = $_GET['id'];
$userid = $_SESSION['userid'];
$sql = "DELETE FROM posts WHERE user_id = $userid AND post_id = $post_id";
$res = mysqli_query($conn, $sql);
if (!$res) {
    header("Location: ../index.php?frobidden=true");
    exit();
} else {
    header("Location: ../index.php?delete=success");
    exit();
}
