<?php
include ("dbFunctions.php");

$message = "";
$po_id = $_POST['po_id'];
$qty = $_POST['qty'];
$p_id = $_POST['product_id'];
//$status = "no";


$updateQuery2 = "INSERT INTO purchase_details(products_product_id,purchase_order_po_id,qty)"
        . " VALUES ($p_id,$po_id,$qty)";
echo $updateQuery2;
$status2 = mysqli_query($link, $updateQuery2) or die(mysqli_error($link));
if ($status2) {
    header("location: add_PO_Item.php?po_id=$po_id");
} 

mysqli_close($link);
?>
