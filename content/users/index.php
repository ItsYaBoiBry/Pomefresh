<?php ?>
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
            #navLinkUsers{
                background-color: #E53F1B;
            }
        </style>
     

    </head>
    <body>
<!--        <a href="../widget/sidebar.php"></a>-->
        <?php include '../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Users</h1>
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
