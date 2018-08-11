<?php
session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            body{
                font-family:"Quicksand", sans-serif;
            }
        </style>

    </head>
    <body>
        <!--        <a href="../widget/sidebar.php"></a>-->
        <?php include '../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Users</h1>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>
            <hr>
            <a href="vendors/vendorList.php">Vendors</a><br>
            <a href="customers/customerList.php">Customers</a>
            <hr>
        </div>
        <script>

        </script>


    </body>
</html>
