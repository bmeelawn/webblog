<?php

if (isset($_POST['createpost-submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $categories = mysqli_real_escape_string($conn, $_POST['categories']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $user_id = $_SESSION['userid'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $author = $firstname . ' ' . $lastname;

    if (empty($title) || empty($categories) || empty($body)) {
        $message = "<p class='error text-center'>All field in required!</p>";
    } else {
        $query = "INSERT INTO posts(user_id, category, title, author, body, created_at) ";
        $query .= "VALUES($user_id, '$categories', '$title', '$author',  '$body', now())";
        $select_all_posts_query = mysqli_query($conn, $query);

        if (!$select_all_posts_query) {
            die("QUERY FAILED. " . mysqli_error($conn));
        }
        header("location: index.php");
    }
}
