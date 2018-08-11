<?php
session_start();
include ("dbFunctions.php");
$query = "SELECT * FROM category ";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);




?>

<html>
    <head>
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="category.css" rel="stylesheet" type="text/css"/>
        <style>
            body{
                font-family:"Quicksand", sans-serif;
            }
        </style>
    </head>
    <body>
<?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Categories</h1>
                 <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>
            <form method="post" action="doAddCategory.php">
                <label>Name: </label>
                <input type="text" name="name" id="name">
                <br/>
                <label>Description: </label>
                <input type="text" name="description" id="description">
                
                <input type="submit" name="add" value="Add" style="padding:15px;background-color:#2DB73B;color:#FFFFFF;border-radius:10px;text-decoration: none;" />
            </form>
    </body>
</html>