<?php
session_start();
include ("dbFunctions.php");
$arrResult = array();
$queryName = "SELECT * FROM category";
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
        <link href="category.css" rel="stylesheet" type="text/css"/>

        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title>Categories</title>
        <style>
            #navLinkOrders{
                background-color: #E53F1B;
            }
            .result{
                padding:10px;
            }
            .tab{
                padding: 10px;
            }
            #btnSearch{
                background-color: #2DB73B;
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
                <h1 style="font-size: 25px;">Categories</h1>
                 <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>
            <div id="body">
                <h1 class="ee">Manage Categories</h1>
                <div class="topnav" align="center">

                    <input type="text" id="filter" placeholder="Search.." class="filter" >
                    <input type="button" class="btnSearch" id="btnSearch" value="Filter..." style="padding:15px;background-color:#2DB73B;color:#FFFFFF;border-radius:10px;text-decoration: none;" >
                    <br/>
                    <div id="searchResult"></div>

                </div>
                <br/>
                <div id="table">
                    <table class='tab' align='center' >
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($arrResult); $i++) {
                            ?>
                            <tr  class='tr'>


                                <td class='result'>
                                    <a href="editCat.php?id=<?php echo $arrResult[$i]['category_id']; ?>">


                                        <?php
                                        echo $arrResult[$i]['name'];
                                        //}
                                        ?></a>
                                </td> <td  class='result'>
                                    <?php
                                    echo $arrResult[$i]['description'];
                                    //}
                                    ?>
                                </td>



                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <form action="addCategory.php">
                    <input type="submit" value="Add" class="add" style="padding:15px;background-color:#2DB73B;color:#FFFFFF;border-radius:10px;text-decoration: none;" >
                </form>

            </div>
            <script>

                $("#btnSearch").click(function () {
                    console.log("Clicked");
                    var filter = $("#filter").val();
                    console.log(filter);
                    //var x = document.getElementById("filter").value;
                    $("#searchResult").html("Search result for " + filter);
                    $.ajax({
                        type: "GET",
                        url: "http://www.ehostingcentre.com/Pomefresh/content/settings/categories/getCategories.php",
                        data: "name=" + filter,
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            console.log(response);
                            var message = "";
                            for (i = 0; i < response.length; i++) {
                                message += "<table class='tab' border='1' align='center' style='padding: 10px;'>"
                                        + "<tr><th>Name</th><th>Description</th>"
                                        + "<tr class='tr'>"
                                        + "<td class='result'>" + response[i].name + "</td>"
                                        + "<td class='result'>" + response[i].description + "</td></tr>"
                                        + "</table>";
                            }
                            console.log(message);
                            $("#table").html(message);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                });

            </script>

        </div>

    </body>
</html>
