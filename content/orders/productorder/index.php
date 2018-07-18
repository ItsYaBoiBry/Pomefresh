<?php
include ("dbFunctions.php");
$arrResult = array();
$queryName = "SELECT * FROM purchase_order po, vendor v WHERE po.vendor_vendor_id = v.vendor_id";
$resultsSelect = mysqli_query($link, $queryName) or die("Error in query" . mysqli_error($link));
                        
                        while ($row = mysqli_fetch_assoc($resultsSelect)) {
                            $arrResult[] = $row;
                        }
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Purchase Order</title>
        <style>
            #navLinkOrders{
                background-color: #E53F1B;
            }
        </style>

    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Purchase Order</h1>
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
                        <a href="edit_PO.php?po_id=<?php echo $arrResult[$i]['po_id'];?>">
                            
                            
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
                    <input type="submit" value="Add">
                </form>
                
            </div>

        </div>
    </body>
</html>
