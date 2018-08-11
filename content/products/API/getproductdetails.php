<?php
session_start();

include "../dbconfig.php";
$getid = $_GET['id'];
//type=all  is to get all users (select * from users;)
$query_status_single = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_id = $getid;";
$message_success = "success";
$message_no_products = "No Products";
$message_no_type = "No Type";

if ($conn) {

    $items = getUser($conn, $query_status_single);
    if ($items != []) {
        jsonResponse(200, $message_success, $items);
    } else {
        jsonResponse(404, $message_no_products, null);
    }
} else {
    jsonResponse(401, $message_user_401, null);
}

function jsonResponse($status, $status_message, $data) {
    $response['status'] = $status;
    $response['message'] = $status_message;
    $response['products'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}

function getUser($conn, $query) {
    $resultset = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));

    $data = array();
    while ($rows = mysqli_fetch_assoc($resultset)) {
        $data[] = $rows;
    }
    return $data;
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

