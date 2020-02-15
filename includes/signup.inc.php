<?php

if (isset($_POST['signup-submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwdRepeat = mysqli_real_escape_string($conn, $_POST['repeat-pwd']);

    //check if the fields are empty
    if (empty($username) || empty($email) || empty($firstname) || empty($lastname) || empty($pwd) || empty($pwdRepeat)) {
        $message = "<p class='error'>All field in required!</p>";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) { //check if firstname fields contain alpha
        $message = "<p class='error'>Only letters and white space allowed in firstname.</p>";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) { // check if lastname fields contain alpha
        $message = "<p class='error'>Only letters and white space allowed in lastname.</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // check if email is valid or not
        $message = "<p class='error'>Invalid email format</p>";
    } else if ($pwd !== $pwdRepeat) { // check of password and repeat password is match
        $message = "<p class='error'>Your password do not match!</p>";
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username' OR user_email = '$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($username == $row['username']) { // check if username already exists or not 
                $message = "<p class ='error'>Username already exists.</p>";
            } else if ($email == $row['user_email']) { // check if email already exists or not 
                $message = "<p class='error'>Email already exists.</p>";
            }
        } else {
            $pwdHash = password_hash($pwdRepeat, PASSWORD_DEFAULT);
            $profile_image = "{$username}default.jpg";
            $sql = "INSERT INTO users(username,user_email,user_firstname,user_lastname,user_password,user_profile_image,join_at) VALUES ('$username','$email','$firstname','$lastname','$pwdHash','$profile_image',now())";
            $res = mysqli_query($conn, $sql);
            if (!$res) {
                $message = "<p class='error'>Something went wrong while siging up please try again later</p>";
            } else {
                header("Location: login.php?signup=success");
                exit();
            }
        }
    }
}
