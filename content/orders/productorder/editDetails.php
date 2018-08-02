<?php
session_start();
include("dbFunctions.php");
$id = $_GET['id'];

$po_id = $_GET['po_id'];
$query = "SELECT * FROM purchase_order po, vendor v WHERE po.vendor_vendor_id = v.vendor_id AND po.order_no=" . $id;
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

$query2 = "SELECT * FROM purchase_details pd, products p WHERE p.product_id = pd.products_product_id and pd.id = " . $id;
$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$arrResult2 = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
    $arrResult2[] = $row2;
}
$ID = $row['order_no'];
$vname = $row['vendor_name'];
for ($i = 0; $i < count($arrResult2); $i++) {
    $id2 = $arrResult2[$i]['purchase_order_po_id'];
    $name = $arrResult2[$i]['product_name'];
    $qty = $arrResult2[$i]['qty'];
    $up = $arrResult2[$i]['product_price'];
}
?>
<html>
    <head>
        <title>Categories - Edit story</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="p_o.css" rel="stylesheet" type="text/css"/>
        <script>
            $(document).ready(function () {
                $("[name=delete]").click(function () {
                    confirm("Are you sure you want to delete this category?");
                            if ()
                });
                $("[value=Done]").click(function () {

                    if ()
                });
                //$(".idFor").hide();
            })
        </script>
    </head>
    <body>


        <?php include '../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Purchase Order: <?php echo $id2 ?></h1>
            </div>
            <div id="body">
                <form action="doEditDetails.php?po_id=<?php echo $po_id; ?>" method="POST">
                    <label id="name">Name:</label> 
                    <?php echo $name; ?>
                    <br/>
                    <label id="qty">Quantity: </label>
                    <input type="text" name="qty" id="qty" value="<?php echo $qty ?>">
                    <br/>
                    <label id="u.p">Unit Price</label>
                    <?php echo $up; ?>
                    <br/>


                    <input type="submit" value="Done" class="ui-button">
                    <input type="text" name="idFor" class="idFor" id="idFor" value="<?php echo $id; ?>">
                    <input type="text" name="poid" class="poid" id="poid" value="<?php echo $po_id; ?>">
                </form>
            </div>


        </div>

    </body>
</html>