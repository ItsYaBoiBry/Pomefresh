<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>

<html>
<head>
    <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="css/product_table.css" rel="stylesheet" type="text/css"/>

    <script src="js/loadInitialTable.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <title>Sales Orders</title>

    <style>
        #header {
            background: #E53F1B;
            color: white;
            padding: 20px 0 25px 25px;
        }

        .back {
            width: 100px;
            margin-top: 10px;
            font-size: 10px;
            display: block;
            transition: 0.3s;
            padding: 10px;
            background: none;
            border: none;
        }

        button {
            background: none;
            border: none;
            color: white;
        }
    </style>
</head>
<body onload="loadTable()">
<div id="page">
    <div class="w3-card" id="header">
        <a id="back" href="../index.php"><i class="material-icons">arrow_back</i></a>
        <label style="font-size:30px;margin-left:30px;">Sales orders</label>
    </div>
    <div id="table">
        <br>
        <a href="../../orders/salesorder/csv/exportsalesorder.php"
           style="padding:15px;margin: 20px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none">Export</a>
        <a href="../../orders/salesorder/addsalesorder.php"
           style="padding:15px;margin: 20px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none">New Order</a>
        <br>
        <table id="product">
            <tr>
                <th class="id">
                    No.
                </th>
                <th>
                    <button onclick="">Order Id</button>
                </th>
                <th>
                    <button onclick="">Shipping Address</button>
                </th>
                <th>
                    <button onclick="">Order Date</button>
                </th>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
