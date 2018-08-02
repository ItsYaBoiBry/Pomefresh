<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>

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
<body onload="loadTable()">
<?php include '../../widget/sidebar.php'; ?>
<div id="page">
    <div class="w3-card" id="header">
        <label style="font-size:30px;margin-left:30px;">Sales orders</label>
    </div>
    <form style="margin-top: 30px;margin-left: 20px;s" class="form-horizontal" action="API/addsalesorder.php" method="post"
          name="uploadCSV"
          enctype="multipart/form-data">
        <div class="input-row">
            <input type="file" name="file" id="file" accept=".csv"
                   style="padding:15px;background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none">
            <button type="submit" id="submit" name="import"
                    style="padding:15px;background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none;"
                    class="btn-submit">Import
            </button>
            <br/>

        </div>
        <label id="response"></label>
        <div id="labelError"></div>
    </form>
    <div id="table">
        <br>
        <a href="../../orders/salesorder/csv/exportsalesorder.php"
           style="padding:15px;margin: 20px; background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none">Export Sales Orders</a>
        <br><br>
        <table id="product">
            <tr>
                <th class="id">
                    No.
                </th>
                <th>
                    <button onclick="">Order Id</button>
                </th>
                <th>
                    <button onclick="">Shipping Address</button>
                </th>
                <th>
                    <button onclick="">Order Date</button>
                </th>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
        function() {
            $("#frmCSVImport").on(
                "submit",
                function() {
                    $item = $["#response"];

                    $item.attr("class", "");
                    $item.html("");
                    let fileType = ".csv";
                    let regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
                        + fileType + ")$");
                    if (!regex.test($("#file").val().toLowerCase())) {
                        $item.addClass("error");
                        $item.addClass("display-block");
                        $item.html(
                            "Invalid File. Upload : <b>" + fileType
                            + "</b> Files.");
                        return false;
                    }
                    return true;
                });
        });
</script>
</body>
</html>
