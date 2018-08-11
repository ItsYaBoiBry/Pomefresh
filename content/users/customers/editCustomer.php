<?php
session_start();
include("dbFunctions.php");
$id = $_POST['id'];
$query = "SELECT * FROM customers WHERE id = $id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
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
                font-family:"Quicksand", sans-serif;
            }   
        </style>


    </head>
    <body>
        <?php include '../../widget/sidebar.php' ?>
        <div id="page">
            <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Customers</h1>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                    echo "<div style='text-align:right;float:right;margin-right:50px;'><a href='../../../logout.php'>Logout</a></div>";
                } else {
                    header('Location: /Pomefresh/login.php');
                } ?>

            </div>

            <div id="body">
                <h3>Edit Customer Details</h3>
                <form method="post" action="doEditCustomer.php">

                    <div class="form-group">
                        <label for="idName" class="col-md-2 control-label">Name: </label>
                        <div class="col-md-10">
                            <input id="idName" class="form-control" name="name" required value="<?php echo $row['name'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idEmail" class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                            <input id="idEmail" class="form-control" name="email" required  value="<?php echo $row['email'] ?>"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idContact" class="col-md-2 control-label">Contact Number:</label>
                        <div class="col-md-10">
                            <input id="idContact" class="form-control" name="phone" required  value="<?php echo $row['phone'] ?>"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="idAddress" class="col-md-2 control-label">Address: </label>
                        <div class="col-md-10">
                            <input id="idAddress" class="form-control" name="address" required  value="<?php echo $row['address'] ?>">
                        </div>
                    </div>
                    <br/>
                    <input type="submit" name="Update" class="w3-btn w3-green" value="Update Customer"/>
                    <input type='hidden' name='id' value="<?php echo $row['id']; ?>"  />

                </form>
            </div>
        </div>

    </body>
</html>
