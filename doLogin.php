<?php
session_start();
include "content/dbconfig.php";

$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM users WHERE username='$enteredUsername' AND password=SHA1('$enteredPassword') ";

$resultCheck = mysqli_query($conn, $queryCheck) or die(mysqli_error($conn));

if(mysqli_num_rows($resultCheck) == 1){
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['status'] = 200;
    $msg = "You are logged in as " . $_SESSION['username'] . "<br/>";
    header('Location: content/home/');

} else {
    $msg = "Invalid username or password <br/>";
    $_SESSION['status'] = 404;
    $msg .= "<a href='login.php'> Go back to login page </a> ";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="css/vendor.css" rel="stylesheet" type="text/css"/>
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
    </head>
    <body>
        <div id="page">
            <div id="body">
                <h3>Login</h3>
                <?php
                echo $msg;
                ?>
            </div>
        </div>
    </body>
</html>