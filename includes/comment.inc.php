<?php
if (isset($_SESSION['userid'])) {
    if (isset($_POST['cmt-submit'])) {
        $cmt = mysqli_real_escape_string($conn, $_POST['cmt']);
        $user_id = $_SESSION['userid'];
        $username = $_SESSION['username'];
        $post_id = $_GET['id'];
        if (empty($cmt)) {
            $message = "<p class='error'>Comment cannot be empty</p>";
        } else {
            $sql = "INSERT INTO comments(comment_user_id,comment_post_id,comment_username,comment_text,comment_at) VALUES ($user_id,$post_id,'$username','$cmt',now())";
            $res = mysqli_query($conn, $sql);
            if (!$res) {
                $message = "<p class='error'>Something went wrong</p>";
            } else {
                header("Refresh:0");
                exit();
            }
        }
    }
} else {
    $message = "<p class='error'>You need to logged in in order to comment!</p>";
}
