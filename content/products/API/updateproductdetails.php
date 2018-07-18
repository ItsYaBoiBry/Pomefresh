<?php

include "../../dbconfig.php";
$getid = $_POST['id'];
$getname = $_POST['name'];
$getdescription = $_POST['description'];
$getvendor = $_POST['vendor'];
$getcategories = $_POST['categories'];
$getcostprice = $_POST['costprice'];
$getretailprice = $_POST['retailprice'];
$getquantity = $_POST['quantity'];
$getuom = $_POST['uom'];
$getweight = $_POST['weight'];
if($getweight == null){
    $getweight = 0.00;
}
$getlength = $_POST['length'];
if($getlength == null){
    $getlength = 0.00;
}
$getwidth = $_POST['width'];
if($getwidth == null){
    $getwidth = 0.00;
}
$getheight = $_POST['height'];
if($getheight == null){
    $getheight = 0.00;
}
$getremarks = $_POST['remarks'];


if ($conn) {
    $query_add_product = "UPDATE products SET product_name = '$getname', product_description = '$getdescription', product_cost = '$getcostprice', product_price = '$getretailprice', product_quantity = '$getquantity', product_uom = '$getuom', product_weight = '$getweight', product_length = '$getlength', product_width = '$getwidth', product_height = '$getheight', remarks = '$getremarks', category_id = $getcategories, vendor_id = $getvendor WHERE product_id = $getid;";
    
    $addproduct = AddProduct($conn, $query_add_product);

    if ($addproduct) {
//        JSONResponse(200, "Product updated", $addproduct);
//        header('Location: ../viewproduct.php?id='.$getid);
        echo '<html><head></head><body><script language="javascript">';
        echo 'alert("Product Successfully Updated!");';
        echo 'window.location = "../viewproduct.php?id='.$getid.';"';
        echo '</script></body</html>';
    } else {
        echo '<html><head></head><body><script language="javascript">';
        echo 'alert("Product Not Updated!");';
        echo 'window.location = "../viewproduct.php?id='.$getid.';"';
        echo '</script></body</html>';
    }   
} else {
    JSONResponse(403, "Unauthorized", $addtocart);
}

function JSONResponse($status, $status_message, $data) {
    $response['status'] = $status;
    $response['message'] = $status_message;
    $response['result'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}
function AddProduct($conn, $query) {
    $resultset = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));
    return $resultset;
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

