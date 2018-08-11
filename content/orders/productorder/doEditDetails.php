<?php
session_start();
include ("dbFunctions.php");

$message = "";
$id = $_POST['idFor'];
$po_id = $_POST['poid'];
$qty = $_POST['qty'];
$sts = $_POST['sts'];
//$status = "no";

$updateQuery = "UPDATE purchase_order SET status='$sts' WHERE po_id=$po_id";
$updateQuery2 = "UPDATE purchase_details SET qty='$qty' WHERE id='$id'";
echo $updateQuery2;
$status2 = mysqli_query($link, $updateQuery2) or die(mysqli_error($link));
if ($status2) {
    header("location: index.php");
} 

mysqli_close($link);
?>
