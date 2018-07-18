<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 18/7/2018
 * Time: 9:25 AM
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

    <meta charset="UTF-8">
    <title>Add Sales Order</title>

    <style>
        #header {
            background: #E53F1B;
            color: white;
            padding-top: 20px;
            padding-bottom: 25px;
            padding-left: 25px;
            padding-right: 0;
        }

        input, textarea {
            width: 60%;
            max-width: 60%;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid grey
        }

        select {
            width: 30%;
            max-width: 30%;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid grey
        }

        form {
            margin: 30px;
        }

        option {
            padding: 10px;
        }

        hr {
            border: 0.5px solid grey;
        }
    </style>
</head>
<body>
<div id="page">
    <div class="w3-card" id="header">
        <a id="back" href="index.php"><i class="material-icons">arrow_back</i></a><label
                style="font-size:30px;margin-left:30px;">Add Sales Orders</label>
    </div>
    <form id="form">
        <input title="Name" id="name" type="text" placeholder="Name"/><br>
        <input title="Shipping Address" id="shipping_address" type="text" placeholder="Shipping Address"/><br>
        <input title="Billing Address" id="billing_address" type="text" placeholder="Billing Address"/><br>
    </form>
</div>

</body>
</html>
