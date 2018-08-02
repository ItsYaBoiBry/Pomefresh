<?php
include("dbFunctions.php");

$id = $_GET['vendor_id'];
$query = "SELECT * FROM vendor WHERE vendor_id = $id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
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
<?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Vendors</h1>
            </div>

            <div id="body">
                <h3><b>Vendor:</b> <?php echo $row['vendor_name']; ?></h3>
                <h3><b>Info:</b> <?php echo $row['vendor_info']; ?></h3>
                <h3><b>Acra:</b> <?php echo $row['vendor_acra']; ?></h3>
                <h3><b>Registration Number:</b> <?php echo $row['vendor_registration_number']; ?></h3>
                <h3><b>Registered Address:</b> <?php echo $row['vendor_registered_address']; ?></h3>
                <h3><b>Contact Number:</b> <?php echo $row['vendor_contact_number']; ?></h3>
                <h3><b>Fax:</b> <?php echo $row['vendor_fax']; ?></h3>
                <h3><b>Email:</b> <?php echo $row['vendor_email']; ?></h3>
                <form action="editVendor.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                    
                    <input type="submit" name="edit" value="Edit" class="w3-btn w3-green"/>
                </form>
                <form action="deleteVendor.php" method="post" onsubmit="return confirm('Are you sure you want to delete this vendor?')">
                    <input type="hidden" name="id" id="id" value="<?php echo $row['vendor_id']; ?>"/>
                    
                    <input type="submit" name="delete" value="Delete" class="w3-btn w3-red"/>
                </form>
                
            </div>
        </div>
    </body>
</html>
