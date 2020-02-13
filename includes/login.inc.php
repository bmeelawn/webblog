<?php

if (isset($_POST['submit'])) {

    $login_username = $_POST['uid'];
    $login_password = $_POST['pwd'];

    $query = "SELECT * FROM users";
    $all_users_query = mysqli_query($connection, $query);

    while($row=mysqli_fetch($all_users_query)) {

        $username = $row['username'];
        $password = $row['user_password'];

        if ($username === $login_username || $email === $login_username) {

            

        }

    }








}

?>