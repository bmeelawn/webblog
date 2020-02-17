<?php
include 'db.inc.php';
$post_id = $_GET['id'];
$sql = "DELETE FROM posts WHERE post_id = $post_id";
$res = mysqli_query($conn, $sql);
if (!$res) {
    $message = "Something went wrong";
} else {
    header('Location: ../index.php');
    exit();
}
