<?php
session_start();
include("dbFunctions.php");

$id = $_GET['id'];
$query = "SELECT * FROM customers WHERE id = $id";
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
                <h3><b>Customer Name:</b> <?php echo $row['name']; ?></h3>
                <h3><b>Email:</b> <?php echo $row['email']; ?></h3>
                <h3><b>Contact Number:</b> <?php echo $row['phone']; ?></h3>
                <h3><b>Address:</b> <?php echo $row['address']; ?></h3>
                <form action="editCustomer.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>

                    <input type="submit" name="edit" value="Edit" class="w3-btn w3-green"/>
                </form>
                <form action="deleteCustomer.php" method="post" onsubmit="return confirm('Are you sure you want to delete this customer?')">
                    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>"/>

                    <input type="submit" name="delete" value="Delete" class="w3-btn w3-red"/>
                </form>
            </div>
        </div>
    </body>
</html>
