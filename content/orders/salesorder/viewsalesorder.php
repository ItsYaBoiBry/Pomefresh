<?php
session_start();

include "../../dbconfig.php";
$id = $_GET['id'];
$totalprice = 0.00;
$totalweight = 0.00;
$query_select_sales_order = "select so.*,c.name,c.email,c.phone,s.status FROM sales_orders so, customers c, sales_order_status s WHERE so.customers_id = c.id AND so.sales_order_status_id = s.id AND so.so_id = $id";
$query_select_sales_order_item = "SELECT s.qty, p.product_id, p.product_name FROM sales_items s, products p WHERE  s.products_product_id = p.product_id AND s.sales_orders_so_id = $id";
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
        $result1 = $data[0];
        
        $id = $result1['so_id'];
        $shippingaddress = $result1['so_shipping_address'];
        $billingaddress = $result1['so_billing_address'];
        $transactionid = $result1['so_transaction_id'];
        $transactiondate = $result1['so_date'];
        $name = $result1['name'];
        $email = $result1['email'];
        $contact = $result1['phone'];

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
            <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
            <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <link href="css/product_table.css" rel="stylesheet" type="text/css"/>
            <script src="js/loadInitialTable.js" type="text/javascript"></script>
            <meta charset="UTF-8">
            <title>Sales Orders</title>
            <style>
                #header {
                    background: #E53F1B;
                    color: white;
                    padding: 20px 0 25px 25px;
                }

                .back {
                    width: 100px;
                    margin-top: 10px;
                    font-size: 10px;
                    display: block;
                    transition: 0.3s;
                    padding: 10px;
                    background: none;
                    border: none;
                }

                button {
                    background: none;
                    border: none;
                    color: white;
                }
            </style>
        </head>
        <body style="font-family: Quicksand, sans-serif">
        <div id="page">
            <div class="w3-card" id="header">
                <a id="back" href="index.php"><i class="material-icons">arrow_back</i></a>
                <label style="font-size:30px;margin-left:20px;">Sales orders</label><br>
                 <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>
            </div>
            
            <div id="content" style="margin: 30px;" class="w3-card">
                <h1 class="w3-card"
                    style="color: white; background: #E53F1B; padding: 10px;">
                    Transaction:&nbsp<?php echo $transactionid; ?></h1>
                <div style="padding: 20px; color: black; font-size: 20px;margin: 20px;">
                    <b><u>Customer Details</u></b><br>
                    <label id="name">Name:&nbsp<b><?php echo $name; ?></b></label><br>
                    <label id="name">Email:&nbsp<b><?php echo $email; ?></b></label><br>
                    <label id="name">Phone:&nbsp<b><?php echo $contact; ?></b></label><br>
                    <hr style="border: black solid 1px;">
                    <b><u>Order Details</u></b><br>
                    <label id="shippingadd">Shipping Address:&nbsp<b><?php echo $shippingaddress; ?></b></label><a
                            style="margin-left: 20px;text-decoration: none;color: blue;"
                            href="http://maps.google.com/?q=<?php echo $shippingaddress; ?>">View Map ></a><br>
                    <label id="billingadd">Billing Address:&nbsp<b><?php echo $billingaddress; ?></b></label><a
                            style="margin-left: 20px;text-decoration: none;color: blue;"
                            href="http://maps.google.com/?q=<?php echo $billingaddress; ?>">View Map ></a><br>
                    <hr style="border: black solid 1px;">
                    <label id="ordereddate">Order-Date:&nbsp<b><?php echo GetMonth($transactiondate); ?>
                            (<?php echo GetDay($transactiondate); ?>)</b></label>
                </div>
                <div id="order_products" style="float: left" class="w3-card">
                    <h2 style="background: orangered; color: white; padding: 10px;">
                        Details</h2>
                    <?php
                    for ($i = 0; $i < count($data2); $i++) {
                        $result2 = $data2[$i];
                        $productid = $result2['product_id'];
                        $productname = $result2['product_name'];
                        $productqty = $result2['qty'];
                        ?>
                        <label style="font-size: 20px;margin-left:20px;"><?php echo $i + 1 ?>.&nbsp</label>
                        <b style="font-size: 20px;"><label
                                    id="product<?php echo $productid; ?>"><?php echo $productname; ?></label>
                            &nbsp&nbsp&nbspx&nbsp&nbsp&nbsp
                            <label id="qty"><?php echo $productqty; ?>&nbspPieces</label><label
                                    style="margin-right: 20px;margin-left: 200px; float: right">Total Price: $<?php
                                $query_select_price = "SELECT product_price, product_weight FROM products WHERE product_id = $productid;";
                                $amount = mysqli_query($conn, $query_select_price) or die(json_encode($response["error"] = mysqli_error($conn)));
                                $data3 = array();
                                while ($row3 = mysqli_fetch_assoc($amount)) {
                                    $data3[] = $row3;
                                }
                                if ($amount != []) {
                                    $productprice = $data3[0]['product_price'];
                                    $productweight = $data3[0]['product_weight'];
                                    $totalproductamount = $productprice * $productqty;
                                    $totalproductweight = $productweight * $productqty;
                                    $totalprice = $totalprice + $totalproductamount;
                                    $totalweight = $totalweight + $totalproductweight;
                                    echo $totalproductamount;
                                } else {
                                    echo "Price Unavailable";
                                }
                                ?></label><br><br>

                        <?php
                    }
                    ?>
                </div>
                <div style="padding: 20px;float: left;margin-bottom: 50px;margin-left: 20px;" class="w3-card">
                    <label style="font-size: 20px;"><b>Subtotal:
                            &nbsp&nbsp&nbsp$<?php echo $totalprice; ?></b></label><br><br>
                    <?php
                    $gst = ($totalprice / 100) * 7;
                    $totalprice = $totalprice + $gst
                    ?>
                    <label style="font-size: 20px;"><b>GST 7%: &nbsp&nbsp&nbsp$<?php echo $gst; ?></b></label><br><br>
                    <label style="font-size: 20px;"><b>Total: &nbsp&nbsp&nbsp$<?php echo $totalprice; ?></b></label><br><br>
                    <label style="font-size: 20px;"><b>Total Weight: &nbsp&nbsp&nbsp<?php echo $totalweight; ?>
                            KG</b></label>
                </div>
                <div style="padding: 20px;float: left;margin-bottom: 50px;margin-left: 20px;" class="w3-card">
                    <h3 style="margin-left:30px;">Update Details</h3><br>
            <a style="padding:15px;margin: 20px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none" href="API/updatesalesorders.php?status=2&id=<?php echo "$id";?>">Items Shipped</a><br><br>
            <a style="padding:15px;margin: 20px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none" href="API/updatesalesorders.php?status=3&id=<?php echo "$id";?>">Items Delivered</a><br><br>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
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

function GetMonth($month)
{
    $datesplit = explode("-", $month);
    $getmonth = $datesplit[1];
    if ($getmonth == "01") {
        return $datesplit[2] . " January " . $datesplit[0];
    } else if ($getmonth == "02") {
        return $datesplit[2] . " February " . $datesplit[0];
    } else if ($getmonth == "03") {
        return $datesplit[2] . " March " . $datesplit[0];
    } else if ($getmonth == "04") {
        return $datesplit[2] . " April " . $datesplit[0];
    } else if ($getmonth == "05") {
        return $datesplit[2] . " May " . $datesplit[0];
    } else if ($getmonth == "06") {
        return $datesplit[2] . " June " . $datesplit[0];
    } else if ($getmonth == "07") {
        return $datesplit[2] . " July " . $datesplit[0];
    } else if ($getmonth == "08") {
        return $datesplit[2] . " August " . $datesplit[0];
    } else if ($getmonth == "09") {
        return $datesplit[2] . " September " . $datesplit[0];
    } else if ($getmonth == "10") {
        return $datesplit[2] . " October " . $datesplit[0];
    } else if ($getmonth == "11") {
        return $datesplit[2] . " November " . $datesplit[0];
    } else if ($getmonth == "12") {
        return $datesplit[2] . " December " . $datesplit[0];
    }
}

function GetDay($date)
{
    return date('D', strtotime($date));
}