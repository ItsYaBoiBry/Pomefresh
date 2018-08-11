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
        <link rel="icon" href="../../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
        <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            #navLinkUsers{
                background-color: #E53F1B;
            }
            body{
                font-family: "Quicksand", san-serif;
            }
        </style>
    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Vendors</h1>
              <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>
            <div id="body">
                <h3>Add Vendor</h3>
                <form action="doAddVendor.php" method="post" class="form-horizontal" >
                    <div class="form-group">
                        <label for="idName" class="col-md-2 control-label">Name: </label>
                        <div class="col-md-10">
                            <input id="idName" class="form-control" name="name" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idInfo" class="col-md-2 control-label">Info: </label>
                        <div class="col-md-10">
                            <textarea id="idAcra" class="form-control" name="info" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idAcra" class="col-md-2 control-label">Acra: </label>
                        <div class="col-md-10">
                            <input id="idAcra" class="form-control" name="acra" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idRegistrationNumber" class="col-md-2 control-label">Registration Number: </label>
                        <div class="col-md-10">
                            <input id="idRegistrationNumber" class="form-control" name="registration_number" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idRegisteredAddress" class="col-md-2 control-label">Registered Address: </label>
                        <div class="col-md-10">
                            <input id="idRegisteredAddress" class="form-control" name="registered_address" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idContact" class="col-md-2 control-label">Contact Number:</label>
                        <div class="col-md-10">
                            <input id="idContact" class="form-control" name="contact" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idFax" class="col-md-2 control-label">Fax: </label>
                        <div class="col-md-10">
                            <input id="idFax" class="form-control" name="fax" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idEmail" class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                            <input id="idEmail" class="form-control" name="email" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" class="w3-button w3-red" value="Add Vendor"/>
                        <input type="reset" class="w3-button w3-red" value="Clear"/>
                    </div>


                </form>    

            </div>

        </div>
    </body>
</html>