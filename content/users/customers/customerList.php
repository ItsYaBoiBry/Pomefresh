<?php
include("dbFunctions.php");
$output = "";

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $query = mysqli_query($link, "SELECT * FROM customers WHERE name LIKE '%$name%'");

    $count = mysqli_num_rows($query);
    if ($count == "0") {
        $output = '<h2>No result found!</h2>';
    } else {
        $arr = array();
        while ($row = mysqli_fetch_array($query)) {
            $arr[] = $row;
        }
    }
} else {
    $query = "select * from customers";
    $result = mysqli_query($link, $query);

    $arr = array();
    while ($rowS = mysqli_fetch_array($result)) {
        $arr[] = $rowS;
    }
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
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/vendor.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>


    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Customers</h1>
            </div>

            <div id="body">
                <h3>Customers</h3>
                <a href="addCustomer.php" class="w3-btn w3-green">Add Customer</a>
                <br/><br/>
                <form method="POST" action="customerList.php">
                    <input type="text" name="name" placeholder="Search name...">
                    <input type="submit" name="search" value="Search">
                </form>
                <?php echo $output; ?>
                <br/><br/>
                <?php if ($output == "") { ?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($arr); $i++) {
                        ?>
                        <tr>
                            <td>
                                <a href="customerDetails.php?id=<?php echo $arr[$i]['id']; ?>">
                                    <?php echo $arr[$i]['name']; ?>
                                </a>
                            </td>
                            <td><?php echo $arr[$i]['email']; ?></td>
                            <td><?php echo $arr[$i]['phone']; ?></td>
                            <td><?php echo $arr[$i]['address']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
