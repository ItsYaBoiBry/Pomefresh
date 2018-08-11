<?php
session_start();
include ("dbFunctions.php");
$arrResult = array();
$queryName = "SELECT * FROM purchase_order po, vendor v WHERE po.vendor_vendor_id = v.vendor_id ORDER BY order_no";
$resultsSelect = mysqli_query($link, $queryName) or die("Error in query" . mysqli_error($link));

while ($row = mysqli_fetch_assoc($resultsSelect)) {
    $arrResult[] = $row;
}
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="p_o.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Purchase Order</title>
        <style>
            #navLinkOrders{
                background-color: #E53F1B;
            }
            body{
                font-family:"Quicksand", sans-serif;
            }
        </style>

    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Purchase Order</h1>
                 <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>
            </div>
            <div id="body">
                <table border="1" align="center">
                    <tr>
                        <th>Order Number</th>
                        <th>Vendor</th>


                        <th>Status</th>

                    </tr>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($arrResult); $i++) {
                            ?>



                            <td>
                                <a href="edit_PO.php?po_id=<?php echo $arrResult[$i]['po_id']; ?>">


    <?php
    echo $arrResult[$i]['order_no'];
    //}
    ?></a>
                            </td> <td>
                                    <?php
                                    echo $arrResult[$i]['vendor_name'];
                                    //}
                                    ?>
                            </td>
                            <td>
    <?php
    echo $arrResult[$i]['po_status'];
    //}
    ?>
                            </td>


                        </tr>
<?php } ?>
                </table>
                <form action="add_PO.php">
                    <input type="submit" value="Add" style="    background-color: #2DB73B; color:white;">
                </form>

            </div>

        </div>
    </body>
</html>
