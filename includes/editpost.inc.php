<?php

if (isset($_POST['updatepost-submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $cat = mysqli_real_escape_string($conn, $_POST['categories']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $post_id = $_GET['id'];

    if (empty($title) || empty($cat) || empty($body)) {
        $message = "<p class='error text-center'>All field in required!</p>";
    } else {
        $sql = "UPDATE posts SET title = '$title', body='$body',category='$cat' WHERE post_id = $post_id";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            $message = "Something went wrong";
        } else {
            header("Location: post.php?id=$post_id&update=success");
            exit();
        }
    }
}
