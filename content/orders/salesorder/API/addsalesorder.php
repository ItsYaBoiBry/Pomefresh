<?php
session_start();

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        include '../../../dbconfig.php';
        if ($conn) {
            $gettransactionid = "";
            $file = fopen($fileName, "r");
            $sqlInsertSO = "INSERT INTO `sales_orders`(`so_transaction_id`, `so_shipping_address`, `so_billing_address`, `so_date`, `customers_id`, `sales_order_status_id`) VALUES ";
            $sqlInsertSOD = "INSERT INTO `sales_items`(`sales_orders_so_id`, `products_product_id`, `qty`) VALUES ";
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                if ($column[0] == "SLS") {
                    $getid = $column[2];
                    $query_check_column = "SELECT * FROM sales_orders WHERE so_transaction_id = '$getid';";
                    $checkcode = CheckCode($conn, $query_check_column);
                    if ($checkcode != []) {
                        
                    } else {
                        if ($column[0] == "SLS") {
                            echo "DATE: " . $column[5];

                            $sqlInsertSO .= "('$column[2]','$column[3]','$column[4]','$column[5]',$column[6],$column[8]),";
                            $gettransactionid .= "$column[2],";
                        }
                    }
                }
            }
            $gettransactionidfull = substr($gettransactionid, 0, -1);
            echo "'" . $gettransactionidfull . "'";
            fclose($file);
            if ($sqlInsertSO != "INSERT INTO `sales_orders`(`so_transaction_id`, `so_shipping_address`, `so_billing_address`, `so_date`, `customers_id`, `sales_order_status_id`) VALUES ") {
                $sqlInsertSO = substr($sqlInsertSO, 0, -1) . ';';
                $result = mysqli_query($conn, $sqlInsertSO) or die(json_encode($response["error"] = mysqli_error($conn)));
                if ($result) {
                    $gettrasnactionids = explode(",", $gettransactionidfull);
                    for ($i = 0; $i < count($gettrasnactionids); $i++) {
                        $file2 = fopen($fileName, "r");
                        echo "transactionid:" . $gettrasnactionids[$i];
                        $gettransid = $gettrasnactionids[$i];
                        $getid = CheckCode($conn, "SELECT * FROM sales_orders WHERE so_transaction_id = '$gettransid';");
                        if ($getid != []) {
                            echo "items retrieved";
                            $id = $getid[0]['so_id'];
                            echo "FOR LOOP ID: " . $id;
                            while (($column = fgetcsv($file2, 10000, ",")) !== FALSE) {
                                if ($column[0] == "DTL") {
                                    if ($id == $column[1]) {
                                        echo "RETRIEVED ID: " . $column[1];
                                        $sqlInsertSOD .= "($column[1],$column[2],$column[4]),";
                                    }
                                }
                            }
                        }
                        fclose($file2);
                    }
                    $sqlInsertSOD = substr($sqlInsertSOD, 0, -1) . ';';
                    echo $sqlInsertSOD;

                    $result2 = mysqli_query($conn, $sqlInsertSOD) or die(json_encode($response["error"] = mysqli_error($conn)));
                    if (!empty($result2)) {
                        $type = "success,";
                        $message = "CSV Data Imported into the Database";
                        echo '<html><head></head><body><script language="javascript">';
                        echo 'alert("Sales Order Successfully Added!");';
                        echo 'window.location = "../index.php";';
                        echo '</script></body</html>';
                    } else {
                        $type = "error,";
                        $message = "CSV Data Imported into the Database";
                        echo '<html><head></head><body><script language="javascript">';
                        echo 'alert("Sales Order Not Added!");';
                        echo 'window.location = "../index.php";';
                        echo '</script></body</html>';
                    }
                } else {
                    $type = "error,";
                    $message = "CSV Data Imported into the Database";
                    echo '<html><head></head><body><script language="javascript">';
                    echo 'alert("Sales Order Not Added!");';
                    echo 'window.location = "../index.php";';
                    echo '</script></body</html>';
                }
                mysqli_close($conn);
            } else {
                $type = "error,";
                $message = "CSV Data Imported into the Database";
                echo '<html><head></head><body><script language="javascript">';
                echo 'alert("No New Sales Orders!");';
                echo 'window.location = "../index.php";';
                echo '</script></body</html>';
            }
        }
    } else {
        $type = "error,";
        $message = "CSV Data Imported into the Database";
        echo '<html><head></head><body><script language="javascript">';
        echo 'alert("No CSV File has been uploaded!");';
        echo 'window.location = "../index.php";';
        echo '</script></body</html>';
    }
}

function CheckCode($conn, $query) {
    $resultset = mysqli_query($conn, $query) or die(json_encode($response["error"] = mysqli_error($conn)));
    $data = array();
    while ($rows = mysqli_fetch_assoc($resultset)) {
        $data[] = $rows;
    }
    return $data;
}
