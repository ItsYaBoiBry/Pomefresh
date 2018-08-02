<?php
include ("dbFunctions.php");

$message = "";
$sts = $_POST['statup'];
//$status = "no";
$id = $_POST['idFor'];

$updateQuery = "UPDATE purchase_order SET po_status='$sts' WHERE po_id=$id";

echo $updateQuery;
$status2 = mysqli_query($link, $updateQuery) or die(mysqli_error($link));
if ($status2) {
    header("location: index.php");
} 

mysqli_close($link);
?>
