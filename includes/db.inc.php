<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "iosdev";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    echo "Failed to connect to the database";
}
