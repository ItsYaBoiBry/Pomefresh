<?php
session_start();

include "../../dbconfig.php";

$getname = $_POST['name'];
$getdescription = $_POST['description'];
$getvendor = $_POST['vendor'];
$getcategories = $_POST['categories'];
$getcostprice = $_POST['costprice'];
$getretailprice = $_POST['retailprice'];
$getquantity = $_POST['quantity'];
$getuom = $_POST['uom'];
$getweight = $_POST['weight'];
if ($getweight == null) {
    $getweight = 0.00;
}
$getlength = $_POST['length'];
if ($getlength == null) {
    $getlength = 0.00;
}
$getwidth = $_POST['width'];
if ($getwidth == null) {
    $getwidth = 0.00;
}
$getheight = $_POST['height'];
if ($getheight == null) {
    $getheight = 0.00;
}
$getremarks = $_POST['remarks'];


if ($conn) {
    $query_add_product = "INSERT INTO products (product_id, product_name, product_description, product_cost,product_price,product_quantity,product_uom,product_weight,product_length,product_width,product_height,remarks,category_id,vendor_id,product_status_id)"
            . " VALUES (NULL, '$getname', '$getdescription', '$getcostprice', '$getretailprice', $getquantity, '$getuom', '$getweight', '$getlength', '$getwidth', '$getheight', '$getremarks', $getcategories, $getvendor,2);";
    $addproduct = AddProduct($conn, $query_add_product);

    if ($addproduct) {
//        JSONResponse(200, "Product added", $addproduct);
        echo '<html><head></head><body><script language="javascript">';
        echo 'alert("Product Successfully Added!");';
        echo 'window.location = "../index.php";';
        echo '</script></body</html>';
//        header('Location: ../index.php');
    } else {
        echo '<html><head></head><body><script language="javascript">';
        echo 'alert("Product Not Added!");';
        echo 'window.location = "../index.php";';
        echo '</script></body</html>';
//        header('Location: ../index.php');
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

