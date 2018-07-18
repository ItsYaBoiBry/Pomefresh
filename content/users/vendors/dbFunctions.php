<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "grapflow_pomefresh";
$link = mysqli_connect($host, $username, $password, $db);

if (!$link) {
    die(mysqli_error($link));
}

?>
