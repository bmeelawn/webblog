<?php

if (isset($_POST['changename-submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $user_id = $_SESSION['userid'];

    $sql = "UPDATE users SET user_firstname = '$first_name', user_lastname = '$last_name' WHERE user_id = $user_id";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $message = "Something went wrong";
    } else {
        session_unset();
        session_destroy();
        header('Location: login.php?msg=usernamechange');
        exit();
    }
}
