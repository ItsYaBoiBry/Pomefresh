<?php
$po_id = $_GET['po_id'];


include ("dbFunctions.php");
$query2 = "SELECT * FROM products";
$query = "SELECT * FROM purchase_details WHERE purchase_order_po_id = $po_id";

$result2 = mysqli_query($link2, $query2) or die(mysqli_error($link2));
$arrResult = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
                            $arrResult[] = $row2;
                        }

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$arrResult2 = array();
while ($row = mysqli_fetch_assoc($result)) {
                            $arrResult2[] = $row;
                        }                        
                        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
<!--        <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />-->
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="p_o.css" rel="stylesheet" type="text/css"/>
        <title></title>
                <script>

        </script>
    </head>
    <body>
<?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Purchase Order</h1>
            </div>
            <div id="body">
                <form method="post" action="doAddPOItem.php">
                <label>Product Name: </label>
                <select name="product_id">
                    <?php 
                    for ($i = 0; $i < count($arrResult); $i++) {
                    ?>
                    <option value="<?php echo $arrResult[$i]['product_id']?>">
                    <?php
                    echo $arrResult[$i]['product_name'];
                    ?>
                    </option>
                    <?php }?>
                    
                </select>
                <br/>
                <label>Quantity:</label>
                <input type="text" id="qty" name="qty">
                
                    <input type="submit" value="Add" style="    background-color: #2DB73B; color:white;">
                    <input type="hidden" name="po_id" value="<?php echo $po_id?>">
                </form>
                
            </div>

            <div>
                <table class='tab' align='center' >
                        <tr>
                            <th>Product Number</th>
                            <th>P.O Number</th>
                            <th>Amount purchased</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($arrResult2); $i++) {
                            ?>
                            <tr  class='tr'>


                                <td class='result'>
                                    <a href="../../../content/settings/categories/editCat.php?id=<?php echo $arrResult[$i]['category_id']; ?>">


                                        <?php
                                        echo $arrResult2[$i]['products_product_id'];
                                        //}
                                        ?></a>
                                </td> <td  class='result'>
                                    <?php
                                    echo $arrResult2[$i]['purchase_order_po_id'];
                                    //}
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    echo $arrResult2[$i]['qty'];
                                    ?>
                                </td>
                                <td>
                                    <div id="del">
                                        <a href="deleteDetail.php?id=<?php echo $arrResult2[$i]['id'] ?>" class="ui-button" >Delete</a>
                                    </div>
                                    </td>


                            </tr>
                        <?php } ?>
                    </table>
            </div>
            <form action="index.php">
                <input type="submit" value="Done" style="    background-color: #2DB73B; color:white;">
            </form>
            
        </div>
    </body>
</html>
