<?php
include "../dbconfig.php";
$id = $_GET['id'];
$query_get_details = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_id = $id;";
if ($conn) {
    $resultset = mysqli_query($conn, $query_get_details) or die(json_encode($response["error"] = mysqli_error($conn)));

    $data = array();
    while ($rows = mysqli_fetch_assoc($resultset)) {
        $data[] = $rows;
    }
    $product = $data[0];
    ?>
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
            <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
            <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

            <meta charset="UTF-8">
            <title>View Product</title>

            <style>
                #navLinkProducts{
                    background-color: #E53F1B;
                }     
                #header{
                    background: #E53F1B;
                    color: white;
                    padding-top: 20px;
                    padding-bottom: 25px;
                    padding-left: 25px;
                    padding-right: 0;
                }
                .back{
                    width:100px;
                    margin-top: 10px;
                    font-size: 10px;
                    transition: 0.5s;
                    display: block;
                    transition: 0.3s;
                    padding: 10px;
                    background:none;
                    border:none;
                }
                input,textarea{
                    padding:10px;
                    margin:10px;
                    border-radius:5px;
                    border:1px solid grey;
                }
                select{
                    padding:10px;
                    margin:10px;
                    border-radius:5px;
                    border:1px solid grey;
                    width:40%;
                    max-width:40%;
                }
                form{
                    margin:30px;
                }
                #name{
                    width:40%;
                    max-width:40%;
                }
                #description{
                    width:50%;
                    max-width:50%;
                    max-height:100px;
                    min-height:100px;
                    height:100px;
                }
                #submit, #delete{
                    width:20%;
                    max-width:20%;
                    border:none;
                }
                #submit{
                    background:green;
                    color:white;
                }
                #delete{
                    border-radius:5px;
                    background:red;
                    color:white;
                    text-decoration:none;
                    padding:13px;
                    padding-left:50px;
                    padding-right:50px;
                }
                #id{
                    pointer-events:none;
                    border:none;
                    height:0px;
                    visibility:hidden;
                }
                label{
                    margin-left:10px;

                }
                hr{
                    border:0.5px solid grey;
                }
                #remarks{
                    width:50%;
                    max-width:50%;
                    max-height:100px;
                    min-height:100px;
                    height:100px;
                }
                option{
                    padding:10px;
                }
            </style>

        </head>
        <body>
            <div class="w3-card" id="header">
                <a id="back" href="index.php"><i class="material-icons">arrow_back</i></a><label style="font-size:30px;margin-left:30px;">View Product</label>
            </div>
            <form action="API/updateproductdetails.php" method="post">
                <input type="submit" id="submit" value="Update">
                <?php
                echo "<a id='delete' href='API/deleteproduct.php?id=" . $product['product_id'] . "'>Delete</a>";
                echo "<input name='id' id='id' type='text' value='" . $product['product_id'] . "'><br>";
                echo "<hr>";
                echo "<label><b>Item Name:</b></label><br>";
                echo "<input name='name' type='text' id='name' placeholder='Product Name' value='" . $product['product_name'] . "' required><br>";
                echo "<label><b>Item Description:</b></label><br>";
                echo "<textarea name='description' type='textarea' id='description'placeholder='Product Description' required>" . $product['product_description'] . "</textarea><br>";
                echo "<hr>";
                echo "<label><b>Vendor:</b>&nbsp&nbsp&nbsp&nbsp&nbsp</label>";
                echo "<select name='vendor' id='vendor' required>";

                $resultset2 = mysqli_query($conn, "SELECT * FROM vendor") or die(json_encode($response["error"] = mysqli_error($conn)));
                $data2 = array();
                while ($rows2 = mysqli_fetch_assoc($resultset2)) {
//                    $data2[] = $rows2;
                    $vendorid = $rows2['vendor_id'];
                    $vendorname = $rows2['vendor_name'];
                    if ($vendorid == $product['vendor_id']) {
                        echo "<option value='$vendorid' selected>$vendorname</option>";
                    } else {
                        echo "<option value='$vendorid' >$vendorname</option>";
                    }
                }
               

                echo "</select><br>";
                echo "<label><b>Category:&nbsp&nbsp</b></label>";
                echo "<select name='categories' id='category' required>";
                $resultset3 = mysqli_query($conn, "SELECT * FROM category") or die(json_encode($response["error"] = mysqli_error($conn)));
                $data3 = array();
                while ($rows3 = mysqli_fetch_assoc($resultset3)) {
//                    $data2[] = $rows2;
                    $catid = $rows3['category_id'];
                    $catname = $rows3['name'];
                    if ($catid == $product['category_id']) {
                        echo "<option value='$catid' selected>$catname</option>";
                    } else {
                        echo "<option value='$catid' >$catname</option>";
                    }
                }
                echo "</select><br>";
                echo "<label><b>Cost Price:</b></label>";
                echo "<input name='costprice' type='number' id='costprice' step='0.01' placeholder='Cost Price ($)' value='" . $product['product_cost'] . "' required>";
                echo "<label><b>Sale Price:&nbsp&nbsp</b></label>";
                echo "<input name='retailprice' type='number' id='retailprice' step='0.01' placeholder='Retail Price ($)' value='" . $product['product_price'] . "' required><br>";
                echo "<label><b>Quantity:&nbsp&nbsp</b></label>";
                echo "<input name='quantity' type='number' id='quantity' placeholder='Quantity' value='" . $product['product_quantity'] . "'required><br>";
                echo "<hr>";
                echo "<label><b>UOM:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></label>";
                echo "<input name='uom' type='text' id='uom' placeholder='UOM' value='" . $product['product_uom'] . "' required><br>";
                echo "<label><b>Weight:&nbsp&nbsp&nbsp</b></label>";
                echo "<input name='weight' type='number' id='weight' step='0.01' placeholder='Product Weight' value='" . $product['product_weight'] . "' required>";
                echo "<label><b>Length:&nbsp&nbsp</b></label>";
                echo "<input name='length' type='number' id='length' step='0.01' placeholder='Product length (not required)' value='" . $product['product_length'] . "'><br>";
                echo "<label><b>Width:&nbsp&nbsp&nbsp&nbsp</b></label>";
                echo "<input name='width' type='number' id='width' step='0.01' placeholder='Product width (not required)' value='" . $product['product_width'] . "'>";
                echo "<label><b>Height:&nbsp&nbsp&nbsp</b></label>";
                echo "<input name='height' type='number' id='height' step='0.01' placeholder='Product height (not required)' value='" . $product['product_height'] . "'><br>";
                echo "<textarea name='remarks' type='textarea' id='remarks' placeholder='Additional Remarks'>" . $product['remarks'] . "</textarea><br>";
            } else {
                jsonResponse(403, "Unauthorized", null);
            }
            ?>
            <a href="API/deleteproduct.php"></a>
        </form>
<!--        <script>
            function GetVendors() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/Pomefresh/content/products/API/getvendors.php",
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
                                if (getProduct.vendor_id == $("[name=vendor_id]").val()) {
                                    $('#vendor').append("<option value='" + getProduct.vendor_id + "' selected>" + getProduct.vendor_name + "</option>");
                                } else {
                                    $('#vendor').append("<option value='" + getProduct.vendor_id + "'>" + getProduct.vendor_name + "</option>");

                                }
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
        </script>-->

        <script>
            function GetCategories() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/Pomefresh/content/products/API/getcategories.php",
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
                            $('#vendor').append("<option>No categories available</option>");
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
    </body>
</html>
