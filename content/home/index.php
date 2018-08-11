<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "../dbconfig.php";
//type=all  is to get all users (select * from users;)
$query_status_all_products = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_status_id = 2 ORDER BY P.product_id ASC;";
$query_status_all_sorders = "SELECT * FROM sales_orders";
$resultset = mysqli_query($conn, $query_status_all_products) or die(json_encode($response["error"] = mysqli_error($conn)));
$resultse2 = mysqli_query($conn, $query_status_all_sorders) or die(json_encode($response["error"] = mysqli_error($conn)));
$data = array();
$data2 = array();
while ($rows = mysqli_fetch_assoc($resultset)) {
    $data[] = $rows;
}
while ($rows2 = mysqli_fetch_assoc($resultse2)) {
    $data2[] = $rows2;
}
?>
<html>
    <head>
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            #navLinkHome{
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
                <h1 style="font-size: 25px;">Pomefresh</h1>
                 <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>
            </div>

            <div class="w3-card" style="margin:10px;width:300px;float:left;">
                <h5 style="padding:10px;margin: 0 auto;background:red; color:white;">Low Quantity</h5>
                <div>
                    <?php
                    $count = 0;
                    for ($i = 0; $i < count($data); $i++) {
                        $product = $data[$i];
                        if ($product['product_quantity'] < 500) {
                            $count++;
                        }
                    }
                    echo "<h1 style='width:25px; margin:0 auto;'>$count</h1>";
                    ?>
                    <a style="padding:10px;" href="../products/">View...</a>
                </div>
            </div>

            <div class="w3-card" style="margin:10px;width:300px;float:left;">
                <h5 style="padding:10px;margin: 0 auto;background:green; color:white;">Confirmed Orders</h5>
                <div>
                    <?php
                    $count = 0;
                    for ($i = 0; $i < count($data2); $i++) {
                        $orders = $data2[$i];
                        if ($orders['sales_order_status_id']==1) {
                            $count++;
                        }
                    }
                    echo "<h1 style='width:25px; margin:0 auto;'>$count</h1>";
                    ?>
                     <a style="padding:10px;" href="../orders/salesorder/">View...</a>
                </div>
            </div>

            <div class="w3-card" style="margin:10px;width:300px;float:left;">
                <h5 style="padding:10px;margin: 0 auto;background:green; color:white;">Orders Shipped</h5>
                <div>
                    <?php
                    $count = 0;
                    for ($i = 0; $i < count($data2); $i++) {
                        $orders = $data2[$i];
                        if ($orders['sales_order_status_id']==2) {
                            $count++;
                        }
                    }
                    echo "<h1 style='width:25px; margin:0 auto;'>$count</h1>";
                    ?>
                     <a style="padding:10px;" href="../orders/salesorder/">View...</a>
                </div>
            </div>

            <div class="w3-card" style="margin:10px;width:300px;float:left;">
                <h5 style="padding:10px;margin: 0 auto;background:green; color:white;">Orders Delivered</h5>
                <div>
                    <?php
                    $count = 0;
                    for ($i = 0; $i < count($data2); $i++) {
                        $orders = $data2[$i];
                        if ($orders['sales_order_status_id']==3) {
                            $count++;
                        }
                    }
                    echo "<h1 style='width:25px; margin:0 auto;'>$count</h1>";
                    ?>
                     <a style="padding:10px;" href="../orders/salesorder/">View...</a>
                </div>
            </div>

            

        </div>

    </body>
</html>
