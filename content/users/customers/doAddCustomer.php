<?php
session_start();
include("dbFunctions.php");

$message = "";


//TODO: modify the following code to store the name of the image file into variable $fileName
//TODO: modify the following code to store the intended complete path to store the image file into variable $completePath

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
//        $auth_id = $_SESSION['user_id'];

$insertQuery = "INSERT INTO customers(name, email, phone, address) 
                VALUES  
                ('$name', '$email', '$phone', '$address')";
//echo $insertQuery;
$status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));

if ($status) {
    $message = "Customer added successfully.<br />";
} else {
    $message = "Failed entering customer details.<br />";
    $message .= "<a href='addCustomer.php'>Try Again.</a>";
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
                <h1 style="font-size: 25px;">Customers</h1>
            </div>
            <div id="body">
                <h3>Add Customer</h3>
                <?php echo $message; ?>
                <a href="customerList.php">Go back to Customer List</a>
            </div>

        </div>
    </body>
</html>