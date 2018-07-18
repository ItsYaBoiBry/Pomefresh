<?php
session_start();
include("dbFunctions.php");
/* if (!isset($_SESSION['username'])) {
  echo "You have not logged in.<br/>";
  echo "Please <a href='login.php'>login</a>.";
  exit;
  }
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <?php include '../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Customers</h1>
            </div>

            <div id="body">
                <h3>Add Customer Details</h3>
                <form method="post" action="doAddCustomer.php">

                    <div class="form-group">
                        <label for="idName" class="col-md-2 control-label">Name: </label>
                        <div class="col-md-10">
                            <input id="idName" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idEmail" class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                            <input id="idEmail" class="form-control" name="email" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idContact" class="col-md-2 control-label">Contact Number:</label>
                        <div class="col-md-10">
                            <input id="idContact" class="form-control" name="phone" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idAddress" class="col-md-2 control-label">Address: </label>
                        <div class="col-md-10">
                            <input id="idAddress" class="form-control" name="address" required>
                        </div>
                    </div>
                    <br/>
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" class="w3-button w3-red" value="Add Customer"/>
                        <input type="reset" class="w3-button w3-red" value="Clear"/>
                    </div>

                </form>
            </div>
        </div>
    </body>
</html>