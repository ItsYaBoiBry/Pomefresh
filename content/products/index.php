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
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/product_table.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="js/loadInitialTable.js" type="text/javascript"></script>
    <script src="js/tablesorting.js" type="text/javascript"></script>
    <script src="js/sortcategories.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <title>Pomefresh</title>
    <style>
        #navLinkProducts {
            background-color: #E53F1B;
        }

        .pagination {
            margin: 19px;
            display: inline-block;

        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        button {
            background: none;
            border: none;
            color: white;
            border-bottom: 1px solid white;
        }


    </style>
</head>
<body onLoad="loadTable(), GetCategories()">
<?php include '../widget/sidebar.php'; ?>
<div id="page">
    <div class="w3-card" id="header">
        <h1 style="font-size: 25px;">Products</h1>
    </div>
    <div style="margin:20px;">
        <br>
        <input placeholder="SEARCH PRODUCTS" id="search"
               style="background-color:#FF6E4F;border:none;padding:15px;color:#FFFFFF;"/>
        <select name="category" placeholder="CATEGORIES" id="category" onchange="SortByCategory()"
                style="background-color:#FF6E4F;border:none;padding:15px;color:#FFFFFF;">
            <option value="none">Category</option>
        </select><br><br>
        <a href="newproduct.php" style="padding:15px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;">ADD
            ITEM</a>
        <a href="csv/exportproducts.php"
                style="padding:15px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;">EXPORT DATA
        </a>
        <br><br><br>
    </div>
    <div id="table">
        <table id="product">
            <tr>
                <th class="id">No.</th>
                <th>
                    <button onclick="SortByName()">PRODUCT NAME</button>
                </th>
                <th class="qty">
                    <button onclick="SortByQty()">QUANTITY</button>
                </th>
                <th class="qty">
                    <button onclick="SortBySalesPrice()">SALE PRICE</button>
                </th>
                <th>
                    <button onclick="SortByVendorName()">VENDOR NAME</button>
                </th>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
