<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/7/2018
 * Time: 10:24 AM
 */

include "../../dbconfig.php";
$csv_filename = 'product_list_'.date('Y-m-d').'.csv';
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$csv_filename);


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array());

// fetch the data
$query = "SELECT * FROM products";
$rows = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);