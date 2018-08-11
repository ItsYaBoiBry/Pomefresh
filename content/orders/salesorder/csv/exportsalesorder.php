<?php
/**
 * Created by Bryan.
 * User: Bryan Low
 * Date: 10/7/2018
 * Time: 10:55 PM
 */
include "../../../dbconfig.php";
$csv_filename = 'sales_orders_'.date('Y-m-d').'.csv';

// output headers so that the file is downloaded rather than displayed
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$csv_filename);


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');


// fetch the data

$query = "select so.type, so.so_id, so.so_transaction_id, so.so_shipping_address, so.so_billing_address, so.so_date,so.customers_id,c.name,so.sales_order_status_id,s.status FROM sales_orders so, customers c, sales_order_status s WHERE so.customers_id = c.id AND so.sales_order_status_id = s.id;";
$rows = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));

// loop over the rows, outputting them
$data = array();
while ($row = mysqli_fetch_assoc($rows)){
    fputcsv($output, array("HDR","SALES ORDER ID","SALES TRANSACTION ID","SHIPPING ADDRESS", "BILLING ADDRESS","ORDER DATE","CUSTOMER ID","CUSTOMER NAME","ORDER STATUS ID","ORDER STATUS"));

    $so_id = $row['so_id'];
    fputcsv($output, $row);
    // fetch the data
    $query2 = "SELECT si.type,so.so_id,si.products_product_id, p.product_name, si.qty FROM sales_items si, products p,sales_orders so WHERE p.product_id = si.products_product_id AND so.so_id = si.sales_orders_so_id AND si.sales_orders_so_id = $so_id;";
    $rows2 = mysqli_query($conn, $query2) or die(json_encode($response["error"] = mysqli_error($conn)));
// loop over the rows, outputting them
    while ($row2 = mysqli_fetch_assoc($rows2)){
        fputcsv($output,array());
        fputcsv($output, $row2);
    }
}
exit;



