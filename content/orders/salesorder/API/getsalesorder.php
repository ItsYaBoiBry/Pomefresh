<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 20/6/2018
 * Time: 12:06 PM
 */
include "../../../dbconfig.php";

$getType = $_GET['type'];

if ($conn) {
    if ($getType == "all") {
        $query_get_all = "SELECT * FROM sales_orders;";
        $getorder = getDetails($conn, $query_get_all);
        if ($getorder != []) {
            JSONResponse(200, "OK", $getorder);
        } else {
            JSONResponse(404, "NO DATA", $getorder);
        }
    }
} else {
    JSONResponse(402, "NO ACCESS", null);
}

function JSONResponse($status, $status_message, $data)
{
    $response['status'] = $status;
    $response['message'] = $status_message;
    $response['result'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}

function getDetails($connection, $query)
{
    /** @var GET SQL RESULT $resultset */
    $resultset = mysqli_query($connection, $query) or die(json_encode($response["error"] = mysqli_error($connection)));

    $data = array();
    while ($rows = mysqli_fetch_assoc($resultset)) {
        $data[] = $rows;
    }
    return $data;
}
