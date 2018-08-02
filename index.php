<?php
session_start();
if($_SESSION['status']==null){
    header('Location: /Pomefresh/login.php');
}else if($_SESSION['status']==404){
    header('Location: /Pomefresh/login.php');
}else if($_SESSION['status']==200){
    header('Location: /Pomefresh/content/home/');
}

?>
