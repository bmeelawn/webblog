<?php
if (isset($_POST['changepwd-submit'])) {
    $oldpwd = mysqli_real_escape_string($conn, $_POST['oldpwd']);
    $newpwd = mysqli_real_escape_string($conn, $_POST['newpwd']);
    $renewpwd = mysqli_real_escape_string($conn, $_POST['new-repeat-pwd']);

    if (empty($oldpwd) || empty($newpwd) || empty($renewpwd)) {
        $message = "<p class='error'>All field in required!</p>";
    } else if ($newpwd !== $renewpwd) {
        $message = "<p class='error'>Your password do not match!</p>";
    } else {
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE user_id = $userid";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $pwdVerify = password_verify($oldpwd, $row['user_password']);
            if (!$pwdVerify) {
                $message = "<p class='error'>Your old password is incorrect!</p>";
            } else {
                $passwordHash = password_hash($renewpwd, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET user_password = '$passwordHash' WHERE user_id = $userid";
                $res = mysqli_query($conn, $sql);
                if (!$res) {
                    $message = "<p class='error'>Cannot Change password right now please try again later</p>";
                } else {
                    session_unset();
                    session_destroy();
                    header('Location: login.php?msg=pwdchange');
                    exit();
                }
            }
        }
    }
}
