<?php
session_start();
include "dbFunctions.php";
$id = $_POST['id'];

$message = "";

$query = "DELETE FROM vendor WHERE vendor_id='$id' ";

$status = mysqli_query($link, $query) or die(mysqli_error($link));

if ($status) {
    $message = "Vendor deleted successfully.<br />";
} else {
    $message = "Failed deleting vendor.<br />";
    $message .= "<a href='vendorList'>Try Again.</a>";
}


?>
<html>
    <head>
        <link rel="icon" href="../.././img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
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
                font-family: "Quicksan", san-serif;
            }
        </style>
    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Vendors</h1>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>
             
            </div>
            <div id="body">
                <h3>Delete Vendor</h3>
                <?php echo $message; ?>
                <a href="vendorList.php">Go back to Vendor List</a>
            </div>
        </div>
    </body>
</html>
