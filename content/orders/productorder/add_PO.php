<?php
include ("dbFunctions.php");
$query2 = "SELECT * FROM vendor";

$result2 = mysqli_query($link2, $query2) or die(mysqli_error($link2));
while ($row2 = mysqli_fetch_assoc($result2)) {
                            $arrResult[] = $row2;
                        }
?>

<html>
    <head>
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    </head>
    <body>
<?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Categories</h1>
            </div>
            <form method="post" action="doAddPO.php">
                <label>Order Number: </label>
                <input type="text" name="onum" id="onum">
                <br/>
                
                <label>Vendor ID: </label>
                <select name="vendor_id">
                    <?php 
                    for($i = 0; $i < count($arrResult); $i++){
                    ?>
                    <option name="vendor_id" id="vendor_id" value="<?php echo $arrResult[$i]['vendor_id'];?>"><?php echo $arrResult[$i]['vendor_name'];?></option>
                    <?php } ?>
                </select>
                
                
               
                <input type="submit" name="add" value="Add Item"/>
            </form>
        </div>
    </body>
</html>