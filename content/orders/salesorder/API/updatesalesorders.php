<?php


session_start();

include '../../../dbconfig.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/
$getstatus = $_GET['status'];
$getid = $_GET['id'];

$getquantity = "SELECT  SI.* from sales_items SI, products P WHERE SI.products_product_id = P.product_id AND SI.sales_orders_so_id = $getid";
$querygettransaction = "UPDATE sales_orders SET sales_order_status_id = $getstatus WHERE so_id = $getid;";

$status2 = mysqli_query($conn, $getquantity) or die(mysqli_error($conn));
$data = array();
while ($rows = mysqli_fetch_assoc($status2)) {
    $data[] = $rows;
}
if ($data != []) {
    for ($i = 0; $i < count($data); $i++) {
        $productid = $data[$i]['products_product_id'];
        $productqty = $data[$i]['qty'];
        $querygettotalqty = "SELECT product_quantity FROM products WHERE product_id = $productid";

        $status3 = mysqli_query($conn, $querygettotalqty) or die(mysqli_error($conn));
        $data2 = array();
        while ($rows2 = mysqli_fetch_assoc($status3)) {
            $data2[] = $rows2;
        }
        $newqty = $data2[0]['product_quantity'];
        $totalnewqty = $newqty - $productqty;
        $queryupdateqty = "UPDATE products SET product_quantity = $totalnewqty WHERE product_id = $productid;";
        $update1 = mysqli_query($conn, $queryupdateqty);
        if ($update1) {
            $updateitem = UpdateOrder($conn, $querygettransaction) or die(mysqli_error($conn));
            if ($updateitem) {
                echo '<html><head></head><body><script language="javascript">';
                echo 'alert("Order Updated!");';
                echo 'window.location = "../viewsalesorder.php?id=' . $getid . '"';
                echo '</script></body</html>';
            } else {
                echo '<html><head></head><body><script language="javascript">';
                echo 'alert("Order Not Updated!");';
                echo 'window.location = "../viewsalesorder.php?id=' . $getid . '"';
                echo '</script></body</html>';
            }
        }else{
            echo '<html><head></head><body><script language="javascript">';
            echo 'alert("Order Not Updated!");';
            echo 'window.location = "../viewsalesorder.php?id=' . $getid . '"';
            echo '</script></body</html>';
        }
    }

}


function UpdateOrder($conn, $query)
{
    $resultset = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));
    return $resultset;
}

