<?php
include("dbFunctions.php");
$output = "";

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $query = mysqli_query($link, "SELECT * FROM vendor WHERE vendor_name LIKE '%$name%'");

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
    $queryStories = "select * from vendor";
    $resultStories = mysqli_query($link, $queryStories);

    $arr = array();
    while ($rowS = mysqli_fetch_array($resultStories)) {
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
        <link href="../customers/css/vendor.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            #navLinkUsers{
                background-color: #E53F1B;
            }
        </style>
    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Vendors</h1>
            </div>

            <div id="body">
                <h3>Vendors</h3>
                <a href="addVendor.php" class="w3-btn w3-green">Add Vendor</a>
                <br/><br/>
                <form method="POST" action="vendorList.php">
                    <input type="text" name="name" placeholder="Search name...">
                    <input type="submit" name="search" value="Search">
                </form>
                <?php echo $output; ?>
                <br/><br/>
                <?php if ($output == "") { ?>
                <table>
                    <tr>
                        <th>Vendor</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Fax</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($arr); $i++) {
                        ?>
                        <tr>
                            <td>
                                <a href="vendorDetails.php?vendor_id=<?php echo $arr[$i]['vendor_id']; ?>">
                                    <?php echo $arr[$i]['vendor_name']; ?>
                                </a>
                            </td>
                            <td><?php echo $arr[$i]['vendor_registered_address']; ?></td>
                            <td><?php echo $arr[$i]['vendor_contact_number']; ?></td>
                            <td><?php echo $arr[$i]['vendor_fax']; ?></td>
                            <td><?php echo $arr[$i]['vendor_email']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
