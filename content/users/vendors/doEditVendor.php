<?php
session_start();
include("dbFunctions.php");

$message = "";


//TODO: modify the following code to store the name of the image file into variable $fileName
//TODO: modify the following code to store the intended complete path to store the image file into variable $completePath

$id = $_POST['id'];
$name = $_POST['name'];
$info = $_POST['info'];
$acra = $_POST['acra'];
$registration_number = $_POST['registration_number'];
$registered_address = $_POST['registered_address'];
$contact = $_POST['contact'];
$fax = $_POST['fax'];
$email = $_POST['email'];
//        $auth_id = $_SESSION['user_id'];

$insertQuery = "UPDATE vendor set vendor_name='$name', vendor_info='$info', vendor_acra='$acra'
         , vendor_registration_number='$registration_number', vendor_registered_address='$registered_address'
         , vendor_contact_number='$contact', vendor_fax='$fax', vendor_email='$email'
         WHERE vendor_id=$id";
//echo $insertQuery;
$status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));

if ($status) {
    $message = "Vendor edited successfully.<br />";
} else {
    $message = "Failed editing vendor details.<br />";
    $message .= "<a href='editVendor.php'>Try Again.</a>";
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <?php include '../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Vendors</h1>
            </div>
            <div id="body">
                <h3>Edit Vendor</h3>
                <?php echo $message; ?>
                <a href="vendorList.php">Go back to Vendor List</a>
            </div>

        </div>
    </body>
</html>