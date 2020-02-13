<?php

include 'db.inc.php';


$message = "";

if (isset($_POST['login-submit'])) {

    $login_username = $_POST['uid'];
    $login_password = $_POST['pwd'];


    $login_username = mysqli_real_escape_string($conn, $login_username);
    $login_password = mysqli_real_escape_string($conn, $login_password);

    $query = "SELECT * FROM users where username = '$login_username' OR user_email = '$login_username'";
    $all_users_query = mysqli_query($conn, $query);

    while($row=mysqli_fetch_assoc($all_users_query)) {

        if (count($row)<0) {

            $message ="Password or Email Incorrect.";

        }

        $password = $row['user_password'];

    }

        if ($password !== $login_password) {

            $message = "Password incorrect";

        } else {

            $message = "You are successully login.";

        }

         header("location: ../login.php");


}

?>