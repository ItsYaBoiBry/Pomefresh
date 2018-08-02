<?php 
session_start();

$message = "";

if(isset($_SESSION['username'])) {
    session_destroy();
}

$message = "<p> You have logged out. <br/> <a href='index.php'>Go back to home page </a> </p>";
?>
<!DOCTYPE html>
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
    </head>
    <body>
        <div id="page">
            <div id="body">
                <h3>Logout</h3>
                <?php echo $message; ?>
            </div>
        </div>
        
    </body>
</html>