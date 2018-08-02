<?php
// php file that contains the common database connection code
include "content/dbconfig.php";

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO users
          (name,username,password) 
          VALUES 
          ('$name','$username',SHA1('$password'))";

$status = mysqli_query($conn, $query);

if ($status) {
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='login.php'>login</a>.</p>";
} else {
    $message = "account creation failed";
}

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" href="img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/vendor.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            #navLinkUsers{
                background-color: #E53F1B;
            }
        </style>
    </head>
    <body>
        <div id="page">


            <div id="body">
                <h3>Staff Registration</h3>
                <?php
                echo $message;
                ?>
            </div>
        </div>
    </body>
</html>