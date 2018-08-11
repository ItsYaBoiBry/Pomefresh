<?php

$host = "localhost";
$username = "pomefresh_admin";
$password = "admin123";
$db = "pomrefresh_db";
$link = mysqli_connect($host, $username, $password, $db);

if (!$link) {
    die(mysqli_error($link));
}

?>
