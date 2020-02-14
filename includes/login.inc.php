<?php

if (isset($_POST['login-submit'])) {

    $login_username = $_POST['uid'];
    $login_password = $_POST['pwd'];

    $login_username = mysqli_real_escape_string($conn, $login_username);
    $login_password = mysqli_real_escape_string($conn, $login_password);

    // check if username is empty or not
    if (empty($login_username) || empty($login_password)) {
        $message = "<p class='error'>Fill in all required!</p>";
    } else {
        $query = "SELECT * FROM users where username = '$login_username' OR user_email = '$login_username'";
        $all_users_query = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($all_users_query)) {
            $username= $row['username'];
            $user_email = $row['user_email'];
            $pwdCheck = password_verify($login_password, $row['user_password']);
            if (!$pwdCheck) {
                $message = "<p class='error'>Incorrect password.</p>";
            } else {
                // Storing Session Values
                $_SESSION['username'] = $username;
                $_SESSION['user_email'] = $user_email;
                header("Location: profile.php?login=success");
                exit();
            }
        } else {
            $message = "<p class='error'>Password or Email Incorrect!</p>";
        }
    }
}
