<?php
session_start();
include("dbFunctions.php");

$message = "";


//TODO: modify the following code to store the name of the image file into variable $fileName
//TODO: modify the following code to store the intended complete path to store the image file into variable $completePath

$name = $_POST['name'];
$info = $_POST['info'];
$acra = $_POST['acra'];
$registration_number = $_POST['registration_number'];
$registered_address = $_POST['registered_address'];
$contact = $_POST['contact'];
$fax = $_POST['fax'];
$email = $_POST['email'];
//        $auth_id = $_SESSION['user_id'];

$insertQuery = "INSERT INTO vendor(vendor_name, vendor_info, vendor_acra,
            vendor_registration_number, vendor_registered_address, vendor_contact_number,
            vendor_fax, vendor_email) 
                VALUES  
                ('$name','$info', '$acra','$registration_number',
                '$registered_address','$contact', '$fax', '$email')";
//echo $insertQuery;
$status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));

if ($status) {
    $message = "Vendor added successfully.<br />";
} else {
    $message = "Failed entering vendor details.<br />";
    $message .= "<a href='addVendor.php'>Try Again.</a>";
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
                <h3>Add Vendor</h3>
                <?php echo $message; ?>
                <a href="vendorList.php">Go back to Vendor List</a>
            </div>

        </div>
    </body>
</html>