<?php session_start();?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            #navLinkOrders{
                background-color: #E53F1B;
            }
            body{
                font-family:"Quicksand", sans-serif;
            }
        </style>
    </head>
    <body>
        <?php include '../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Orders</h1>
                 <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>
            </div>
            <a href="salesorder/index.php">Sales Orders</a><br>
            <a href="productorder/index.php">Purchase Orders</a>
        </div>
        <script>

        </script>

    </body>
</html>
