<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/7/2018
 * Time: 11:31 AM
 */
include "../../../dbconfig.php";
$id = $_GET['id'];
$query_select_sales_order = "select so.so_id, so.so_transaction_id, so.so_sendto, so.so_date,c.name,s.status FROM sales_orders so, customers c, sales_order_status s WHERE so.customers_id = c.id AND so.sales_order_status_id = s.id AND so.so_id = $id";
$query_select_sales_order_item = "SELECT * FROM sales_items WHERE sales_orders_so_id = $id";
if ($conn) {
    $resultset = mysqli_query($conn, $query_select_sales_order) or die(json_encode($response["error"] = mysqli_error($conn)));

    $data = array();
    while ($rows = mysqli_fetch_assoc($resultset)) {
        $data[] = $rows;
    }
    if ($data != []) {
        $resultset2 = mysqli_query($conn, $query_select_sales_order_item) or die(json_encode($response["error"] = mysqli_error($conn)));

        $data2 = array();
        while ($row2 = mysqli_fetch_assoc($resultset2)) {
            $data2[] = $row2;
        }
        jsonResponse(200, "OK", $data, $data2);
    }


}
function JSONResponse($status, $status_message, $data1, $data2)
{
    $response['status'] = $status;
    $response['message'] = $status_message;
    $response['sales_order_details'] = $data1;
    $response['sales_order_items'] = $data2;


    $json_response = json_encode($response);
    echo $json_response;
}