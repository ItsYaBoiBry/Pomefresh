<?php
session_start();

include "../../dbconfig.php";
$type = $_GET['type'];
//type=all  is to get all users (select * from users;)
$query_status_all = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_status_id = 2 ORDER BY P.product_id ASC;";
$message_success = "success";
$message_no_products = "No Products";
$message_no_type = "No Type";

if ($conn) {
    if ($type === "all") {
        $items = getUser($conn, $query_status_all);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else if ($type === "qty") {
        $query_status_sort_qty = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_status_id = 2 ORDER BY product_quantity ASC;";
        $items = getUser($conn, $query_status_sort_qty);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else if ($type === "name") {
        $query_status_sort_qty = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_status_id = 2 ORDER BY product_name ASC;";
        $items = getUser($conn, $query_status_sort_qty);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else if ($type === "salesprice") {
        $query_status_sort_qty = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_status_id = 2 ORDER BY product_price ASC;";
        $items = getUser($conn, $query_status_sort_qty);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else if ($type === "vendorname") {
        $query_status_sort_qty = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE product_status_id = 2 ORDER BY vendor_name ASC;";
        $items = getUser($conn, $query_status_sort_qty);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else if ($type === "category") {
        $category = $_GET['category'];
        $query_status_sort_qty = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE category_id = ".$category." AND product_status_id = 2 ORDER BY vendor_name ASC;";
        $items = getUser($conn, $query_status_sort_qty);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else if ($type === "search") {
        $keyword = $_GET['keyword'];
        $query_status_sort_qty = "SELECT P.*, V.* FROM products AS P INNER JOIN vendor as V ON (P.vendor_id=V.vendor_id) WHERE P.product_name LIKE '%".$keyword."%' AND product_status_id = 2 ORDER BY P.product_name ASC;";
        $items = getUser($conn, $query_status_sort_qty);
        if ($items != []) {
            jsonResponse(200, $message_success, $items);
        } else {
            jsonResponse(404, $message_no_products, null);
        }
    } else {
        jsonResponse(404, $message_no_type, null);
    }
} else {
    jsonResponse(401, "Unable to Connect to database", null);
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

