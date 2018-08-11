<?php 
session_start();?>
<html>

    <head>
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <meta charset="UTF-8">
        <title>Add Product</title>
        <style>
            body{
                font-family:"Quicksand", sans-serif;
            }
            #header{
                background: #E53F1B;
                color: white;
                padding-top: 20px;
                padding-bottom: 25px;
                padding-left: 25px;
                padding-right: 0;
            }
            input,textarea{
                width: 60%;
                max-width: 60%;
                padding:10px;
                margin:10px;
                border-radius:5px;
                border:1px solid grey
            }
            select{
                width: 30%;
                max-width: 30%;
                padding:10px;
                margin:10px;
                border-radius:5px;
                border:1px solid grey;
            }
            #description{
                width:60%;
            }
            form{
                margin:30px;
            }
            #form{
                margin-top:20px;
                margin:0 auto;
                width:80%;
                padding:20px;
            }
            option{
                padding:10px;
            }
            #length, #width,#height{
                max-width:30%;
            }
            hr{
                border:0.5px solid grey;
            }
        </style>

    </head>
    <body onload="GetVendors(), GetCategories()">
        <div id="page">
            <div class="w3-card" id="header">
                <a id="back" href="index.php"><i class="material-icons">arrow_back</i></a><label style="font-size:30px;margin-left:30px;">Add Product</label><br>
                  <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>
            <div id="form">
                <h3 style="width:100%; text-align:center;">Add a new product</h3>
                <form action="API/addproducts.php" method="post" id="addproduct">
                    <hr>
                    <label><b>Item Name:</b></label><br>
                    <input name='name' type='text' id='name' placeholder='Product Name'required><br>
                    <label><b>Item Description:</b></label><br>
                    <textarea name='description' type='textarea' id='description'placeholder='Product Description' required></textarea><br>
                    <hr>
                    <label><b>Vendor:</b>&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                    <select name='vendor' id='vendor' required>

                    </select><br>
                    <label><b>Category:&nbsp&nbsp</b></label>
                    <select name='categories' id='category' required>
                    </select><br>
                    <label><b>Cost Price:</b></label>
                    <input name='costprice' type='number' id='costprice' step='0.01' placeholder='Cost Price ($)'required><br>
                    <label><b>Sale Price:&nbsp&nbsp</b></label>
                    <input name='retailprice' type='number' id='retailprice' step='0.01' placeholder='Retail Price ($)' required><br>
                    <label><b>Quantity:&nbsp&nbsp</b></label>
                    <input name='quantity' type='number' id='quantity' placeholder='Quantity' required><br>
                    <hr>
                    <label><b>UOM:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></label>
                    <input name='uom' type='text' id='uom' placeholder='UOM' required><br>
                    <label><b>Weight:&nbsp&nbsp&nbsp</b></label>
                    <input name='weight' type='number' id='weight' step='0.01' placeholder='Product Weight' required><br>
                    <label><b>Length:&nbsp&nbsp</b></label>
                    <input name='length' type='number' id='length' step='0.01' placeholder='Product length (not required)' ><br>
                    <label><b>Width:&nbsp&nbsp&nbsp&nbsp</b></label>
                    <input name='width' type='number' id='width' step='0.01' placeholder='Product width (not required)'><br>
                    <label><b>Height:&nbsp&nbsp&nbsp</b></label>
                    <input name='height' type='number' id='height' step='0.01' placeholder='Product height (not required)' ><br>
                    <textarea name='remarks' type='textarea' id='remarks' placeholder='Additional Remarks'></textarea><br>

                    <input type="submit" id="submit" value="Add Item"/>

                </form>
            </div>
            <script>

                function GetVendors() {
                    $.ajax({
                        type: "GET",
                        url: "http://www.ehostingcentre.com/Pomefresh/content/products/API/getvendors.php",
                        data: "type=all",
                        cache: false,
                        dataType: "JSON",
                        success: function (data, textStatus) {
                            console.log("Status: " + data.status);
                            console.log("message: " + data.message);
                            console.log("vendors: " + data.vendors);
                            if (data.status === 200) {
                                for (var i = 0; i < data.vendors.length; i++) {
                                    console.log("vendors: " + data.vendors[i].vendor_id + " : " + data.vendors[i].vendor_name);
                                    var getProduct = data.vendors[i];
                                    $('#vendor').append("<option value='" + getProduct.vendor_id + "'>" + getProduct.vendor_name + "</option>");
                                }
                            } else {
                                $('#vendor').append("<option>No vendors available</option>");
                            }
//                        $(".panel-footer").html("Results: " + data.result);    
                        }
                        ,
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }
            </script>

            <script>

                function GetCategories() {
                    $.ajax({
                        type: "GET",
                        url: "http://www.ehostingcentre.com/Pomefresh/content/products/API/getcategories.php",
                        data: "type=all",
                        cache: false,
                        dataType: "JSON",
                        success: function (data, textStatus) {
                            console.log("Status: " + data.status);
                            console.log("message: " + data.message);
                            console.log("categories: " + data.categories);
                            if (data.status === 200) {
                                for (var i = 0; i < data.categories.length; i++) {
                                    console.log("categories: " + data.categories[i].category_id + " : " + data.categories[i].name);
                                    var getProduct = data.categories[i];
                                    $('#category').append("<option value='" + getProduct.category_id + "'>" + getProduct.name + "</option>");
                                }
                            } else {
                                $('#category').append("<option>No categories available</option>");
                            }
//                        $(".panel-footer").html("Results: " + data.result);    
                        }
                        ,
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }
            </script>
        </div>
    </body>
</html>
