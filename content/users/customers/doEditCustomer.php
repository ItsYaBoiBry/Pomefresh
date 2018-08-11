<?php

session_start();
include("dbFunctions.php");

$message = "";


//TODO: modify the following code to store the name of the image file into variable $fileName
//TODO: modify the following code to store the intended complete path to store the image file into variable $completePath

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
//        $auth_id = $_SESSION['user_id'];

$insertQuery = "UPDATE customers set name='$name', address='$address'
         , phone='$phone', email='$email'
         WHERE id=$id";
//echo $insertQuery;
$status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));

if ($status) {
    $message = "Customer details edited successfully.<br />";
} else {
    $message = "Failed editing customer details.<br />";
    $message .= "<a href='editCustomer.php'>Try Again.</a>";
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            #navLinkUsers{
                background-color: #E53F1B;
            }
            body{
                font-family:"Quicksand", sans-serif;
            }
        </style>
    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Customers</h1>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>
            <div id="body">
                <h3>Edit Customer</h3>
                <?php echo $message; ?>
                <a href="customerList.php">Go back to Customer List</a>
            </div>

        </div>
    </body>
</html>