<?php
session_start();
include("dbFunctions.php");

$message = "";
$sts = $_POST['statup'];
//$status = "no";
$id = $_POST['idFor'];
$getquantity = "SELECT  PD.* from purchase_details PD, products P WHERE PD.products_product_id = P.product_id AND PD.purchase_order_po_id = $id";
$updateQuery = "UPDATE purchase_order SET po_status='$sts' WHERE po_id=$id";


$status2 = mysqli_query($link, $getquantity) or die(mysqli_error($link));
$data = array();
while ($rows = mysqli_fetch_assoc($status2)) {
    $data[] = $rows;
}

if ($data != []) {
    for ($i = 0; $i < count($data); $i++) {
        $productid = $data[$i]['products_product_id'];
        $productqty = $data[$i]['qty'];
        $querygettotalqty = "SELECT product_quantity FROM products WHERE product_id = $productid";

        $status3 = mysqli_query($link, $querygettotalqty) or die(mysqli_error($link));
        $data2 = array();
        while ($rows2 = mysqli_fetch_assoc($status3)) {
            $data2[] = $rows2;
        }
        $newqty = $data2[0]['product_quantity'];
        $totalnewqty = $newqty + $productqty;
        $queryupdateqty = "UPDATE products SET product_quantity = $totalnewqty WHERE product_id = $productid;";
        $update1 = mysqli_query($link, $queryupdateqty);
        if ($update1) {
            $update2 = mysqli_query($link,$updateQuery);
            if ($update2) {
                $status4 = mysqli_query($link, $getquantity) or die(mysqli_error($link));
                if ($status4) {
                    header("location: index.php");
                } else {
                    echo "<html><head><title>Update error</title></head><body><script>console.log('Unable to update details');</script></body></html>";
                }
            }
        }


    }

}

mysqli_close($link);
?>
