<?php
session_start();

 if (isset($_GET['logout'])) {
    $_SESSION['username'] = null;
    $_SESSION['user_email'] = null;

    header("location: ../index.php");
 }


?>