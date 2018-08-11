<?php
session_start();
include ("dbFunctions.php");

$message = "";
$id = $_POST['id'];

$deleteQuery = "DELETE FROM category WHERE category_id='$id'";
$status = mysqli_query($link, $deleteQuery) or die(mysqli_error($link));

if ($status) {
    $message = "Category Deleted successfully.<br />";
} else {
    $message = "Category post failed.<br />";
    $message .= "<a href='editCat.php'>Try Again.</a>";
}

mysqli_close($link);
?>

<html>
    <head>
        <title>Categories</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <style>
            body{
                font-family:"Quicksand", sans-serif;
            }
        </style>
    </head>
    <body>      
        <?php echo $message; ?>
        <a href="index.php">Return</a>
    </body>
</html>