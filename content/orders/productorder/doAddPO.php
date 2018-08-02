<?php
include ("dbFunctions.php");

$message = "";
$onum = $_POST['onum'];
$vname = $_POST['vendor_id'];
$status = "no";


$updateQuery = "INSERT INTO purchase_order(order_no,vendor_vendor_id,po_status)"
        . " VALUES ($onum,'$vname','$status')";
$status = mysqli_query($link, $updateQuery) or die(mysqli_error($link));

if ($status) {
    $selectQuery = "select max(po_id) as num from purchase_order";
$result = mysqli_query($link, $selectQuery) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);
$po_id = $row['num'];
    header("location: add_PO_Item.php?po_id=$po_id");
} 

mysqli_close($link);
?>
