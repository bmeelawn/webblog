<?php
include 'db.inc.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: ../login.php");
    exit();
}

$sql = "DELETE FROM users WHERE user_id = ".$_SESSION['userid']."";
$res = mysqli_query($conn, $sql);

session_unset();
session_destroy();

header("Location: ../index.php?accountdel=success");
exit();
