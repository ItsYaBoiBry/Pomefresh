<?php

include "dbFunctions.php";

// SQL query returns multiple database records.
if (isset($_GET['name'])) {
    $filter = $_GET['name'];
    $query = "SELECT * FROM category WHERE name='$filter' order by category_id";
    $result = mysqli_query($link, $query);
    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    
    if($categories!=[]){
        echo json_encode($categories);
    }else{
        echo json_encode($categories);
    }
    mysqli_close($link);

    
}
?>
