<?php
include 'db.inc.php';
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: ../index.php?fuck");
    exit();
}
include 'db.inc.php';
$post_id = $_GET['id'];
$userid = $_SESSION['userid'];

$sql = "SELECT * FROM posts WHERE user_id = $userid";
$res = mysqli_query($conn, $sql);

while ($row=mysqli_fetch_assoc($res)) {
    $db_post_id = $row['post_id'];

    if ($post_id === $db_post_id) {
    $sql = "DELETE FROM posts WHERE post_id = $post_id";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $message = "Something went wrong";
    } else {
        header('Location: ../index.php?delete=success');
        exit();
    }
    
    } else {
    header("Location: ../index.php?forbidden=true");
    exit();
    }

}




// $sql = "SELECT * FROM posts WHERE user_id = $userid";
// $res = mysqli_query($conn, $sql);
// if (mysqli_num_rows($res) > 0) {
//     $sql = "DELETE FROM posts WHERE post_id = $post_id";
//     $res = mysqli_query($conn, $sql);
//     if (!$res) {
//         $message = "Something went wrong";
//     } else {
//         header('Location: ../index.php?delete=success');
//         exit();
//     }
// } else {
//     header("Location: ../index.php?forbidden=true");
//     exit();
// }
