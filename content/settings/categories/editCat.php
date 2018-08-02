<?php
session_start();
include("dbFunctions.php");
$id = $_GET['id'];
$query = "SELECT * FROM category WHERE category_id=" . $id;
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

$ID = $row['category_id'];
$name = $row['name'];
$desc = $row['description'];
?>

<html>
    <head>
        <title>Categories - Edit story</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <link rel="icon" href="../../img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/sidebar_style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="category.css" rel="stylesheet" type="text/css"/>
        <script>
        $(document).ready(function(){
            $("[name=delete]").click(function(){
                confirm("Are you sure you want to delete this category?");
                if()
            })
        })
        </script>
    </head>
    <body>
        <div id="page">
        <div class="w3-card" id="header">
                <h1 style="font-size: 25px;">Categories</h1>
            </div>
        <?php include '../widget/sidebar.php' ?>
        <form method="post" action="doEditCat.php">
            <label>Name:</label>
            <input type="text" name="name" id="name" maxlength="100" value="<?php echo $row['name'];?>" required autofocus/>
            <label>Description:</label>
            <input type="text" name="description" id="description" maxlength="100" value="<?php echo $row['description'];?>" required/>
                <?php
                
                
                ?>
            <input type="submit" name="Update" value="Update" class="subm" style="padding:15px;background-color:#2DB73B;color:#FFFFFF;border-radius:10px;text-decoration: none;"/>
            <input type="hidden" name="id" id="id" value="<?php echo $row['category_id']; ?>"/>
            
        </form>
            <form action="deleteCategory.php" method='post' onSubmit="return confirm('Are you sure you want to delete this category?')">
             <input type="hidden" name="id" id="id" value="<?php echo $row['category_id']; ?>"/>
           
            <input type="submit" name="delete" value="Delete" class="del"  style="padding:15px;background-color:#E53F1B;color:#FFFFFF;border-radius:10px;text-decoration: none;">
            </form>
        </div>
    </body>
</html>