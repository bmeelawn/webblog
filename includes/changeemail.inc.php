<?php
if (isset($_POST['changeemail-submit'])) {
    $newemail= mysqli_real_escape_string($conn, $_POST['newemail']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($newemail) || empty($pwd)) {
        $message = "<p class='error'>All field in required!</p>";
     } else if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)){
        $message = "<p class='error'>Invalid email format!</p>";
    } 
    else {
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE user_id = $userid";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $pwdVerify = password_verify($pwd, $row['user_password']);
            if (!$pwdVerify) {
                $message = "<p class='error'>Your password is incorrect!</p>";
            } else {
                $sql = "UPDATE users SET user_email = '$newemail' WHERE user_id = $userid";
                $res = mysqli_query($conn, $sql);
                if (!$res) {
                    $message = "<p class='error'>Cannot Change email right now please try again later</p>";
                } else {
                    session_unset();
                    session_destroy();
                    header('Location: login.php?msg=emailchange');
                    exit();
                }
            }
        }
    }
}
