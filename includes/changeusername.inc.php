<?php

if (isset($_POST['changeusername-submit'])) {
    $newusername = mysqli_real_escape_string($conn, $_POST['newusername']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
   

    if (empty($newusername) || empty($pwd)) {
        $message = "<p class='error'>All field in required!</p>";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $newusername)) {
        $message = "<p class='error'>Only letters and white space allowed in Username.</p>";
    } else {
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE user_id = $userid";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $pwdVerify = password_verify($pwd, $row['user_password']);
            if (!$pwdVerify) {
                $message = "<p class='error'>Your password is incorrect!</p>";
            } else {
                $sql = "UPDATE users SET username = '$newusername' WHERE user_id = $userid";
                $res = mysqli_query($conn, $sql);
                if (!$res) {
                    $message = "<p class='error'>Cannot Change Username right now please try again later</p>";
                } else {
                    session_unset();
                    session_destroy();
                    header('Location: login.php?msg=usernamechange');
                    exit();
                }
            }
        }
    }
}
