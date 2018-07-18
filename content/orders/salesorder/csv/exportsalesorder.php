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
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$csv_filename);


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('', 'Order id', 'Shipping Address','Order Date','Name','Order Status'));

// fetch the data
$query = "select so.so_id, so.so_transaction_id, so.so_shipping_address, so.so_billing_address, so.so_date,c.name,s.status FROM sales_orders so, customers c, sales_order_status s WHERE so.customers_id = c.id AND so.sales_order_status_id = s.id";
$rows = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);