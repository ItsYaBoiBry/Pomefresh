<?php
session_start();
include("dbFunctions.php");
$id = $_GET['po_id'];
//$po_id = $_GET['po_id'];
$query = "SELECT * FROM purchase_order po, vendor v WHERE po.vendor_vendor_id = v.vendor_id AND po.order_no=" . $id;
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

$query2 = "SELECT * FROM purchase_details pd, products p WHERE p.product_id = pd.products_product_id and pd.purchase_order_po_id = " . $id;
$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$arrResult2 = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
    $arrResult2[] = $row2;
}
$ID = $row['order_no'];
$vname = $row['vendor_name'];
for ($i = 0; $i < count($arrResult2); $i++) {
    $id = $arrResult2[$i]['purchase_order_po_id'];
}
?>

<html>
<head>
    <title>Categories - Edit story</title>
<!--    <link rel="stylesheet" type="text/css" href="stylesheets/style.css"/>-->
    <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="p_o.css" rel="stylesheet" type="text/css"/>

    <script>
        $(document).ready(function () {
            $("[name=delete]").click(function () {
                confirm("Are you sure you want to delete this category?");
                if ()
                    });
            $("[value=Done]").click(function () {

                if () ;
            });
        })
    </script>
</head>
<body>


<?php include '../../widget/sidebar.php' ?>
<div id="page">
    <div class="w3-card" id="header">
        <h1 style="font-size: 25px;">Purchase Order: <?php echo $id ?></h1>
         <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>
    </div>
    <div id="body">


    </div>

    <div>
        <table class='tab' align='center'>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>

                <th>Unit Price</th>
                <th>Total Price</th>

            </tr>
            <?php
            for ($i = 0; $i < count($arrResult2); $i++) {
                ?>
                <tr class='tr'>


                    <td class='result'>

                        <a href="editDetails.php?id=<?php
                        echo $arrResult2[$i]['id'];
                        ?>&po_id=<?php echo $id ?>"><?php
                            echo $arrResult2[$i]['product_name'];
                            ?>

                    </td>
                    <td>
                        <?php
                        echo $arrResult2[$i]['qty'];
                        ?>

                    </td>

                    <td>
                        <?php
                        echo $arrResult2[$i]['product_price'];
                        ?>
                    </td>

                    <td>
                        <?php
                        $amt = $arrResult2[$i]['product_price'];
                        $qtyo = $arrResult2[$i]['qty'];
                        $ttl = $amt * $qtyo;

                        echo $ttl;
                        ?>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div id="del">
                            <a href="deleteDetail.php?id=<?php echo $arrResult2[$i]['id'] ?>" class="ui-button"
                               onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                        </div>
                    </td>


                </tr>
            <?php } ?>
        </table>


    </div>
    <form action="doEditStatus.php" method="post">


        <span> Has the quota been fufilled?</span>


        <select name="statup">

            <option value="yes">
                Yes
            </option>
            <option value="no">
                No
            </option>
        </select>


        <input type="text" name="idFor" class="idFor" id="idFor" value="<?php echo $id; ?>">
        <br/><br/>
        <input type="submit" value="Done" class="ui-button"
               style="padding:15px;background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none;">
    </form>

    <form action="add_PO_Item.php?<?php echo $id; ?>">


        <input type="submit" value="Add" class="ui-button"
               style="padding:15px;background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none;">
        <input type="text" name="po_id" class="po_id" id="po_id" value="<?php echo $id; ?>">
    </form>

</div>
<?php /*
          <form method="post" action="doEditCat.php">
          <label>Product:  </label>
          <input type="text" name="o_n" id="name" maxlength="100" value="<?php echo $row['order_no'];?>" required autofocus/>
          <label>Status:</label>
          <input type="text" name="description" id="description" maxlength="100" value="<?php echo $row['vendor_name'];?>" required/>
          <?php


          ?>
          <input type="submit" name="Update" value="Update"/>
          <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>"/>

          </form>
          <form action="deleteCategory.php" method='post' onSubmit="return confirm('Are you sure you want to delete this category?')">
          <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>"/>

          <input type="submit" name="delete" value="Delete" >
          </form>
          </div>
         * 
         */ ?>
</body>
</html>