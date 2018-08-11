<?php
session_start();

include "../../dbconfig.php";
$id= $_GET['id'];
//type=all  is to get all users (select * from users;)
$query_status_all = "UPDATE products SET product_status_id = 1 WHERE product_id = $id;";
$message_success = "success";
$message_no_products = "Failed to delete product";
$message_no_type = "No Type";

if ($conn) {

    $items = getUser($conn, $query_status_all);
    if ($items) {
        jsonResponse(200, $message_success, $items);
        header("Location: ../index.php");
    } else {
        jsonResponse(404, $message_no_products, null);
    }
} else {
    jsonResponse(401, "Unable to connect to database", null);
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

    return $resultset;
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
