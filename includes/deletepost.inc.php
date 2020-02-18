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


// -----Another method comparing post id----
// while ($row=mysqli_fetch_assoc($res)) {
//     $db_post_id = $row['post_id'];

//     if ($post_id === $db_post_id) {
//     $sql = "DELETE FROM posts WHERE post_id = $post_id";
//     $res = mysqli_query($conn, $sql);
//     if (!$res) {
//         $message = "Something went wrong";
//     } else {
//         header('Location: ../index.php?delete=success');
//         exit();
//     }

//     } else {
//     header("Location: ../index.php?forbidden=true");
//     exit();
//     }

// }
