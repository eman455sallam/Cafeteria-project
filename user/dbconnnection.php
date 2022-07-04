<?php
require "../inc/database.php";

$dbconn = new DB();
// $dbconn->_construct();
// var_dump($dbco



if(isset($_GET['firstDate']) && isset($_GET['secondDate'])){

    $all_rows = $dbconn->get_data("*","orders","date BETWEEN '{$_GET['firstDate']}' AND '{$_GET['secondDate']}'");

    $result = $all_rows->fetchAll(PDO::FETCH_ASSOC);

    $json_data = json_encode($result);
// header("content-type:application/json")
echo ($json_data);
// exit();

}


if(isset($_GET['orderDate'])){

    $products_details=[];

    $all_rows = $dbconn->get_data("*","orders","date ='{$_GET['orderDate']}'");

    $orders = $all_rows->fetchAll(PDO::FETCH_ASSOC);

    $orders_details = $dbconn->get_data("product_id,count","users_orders","order_id ='{$orders[0]['id']}'");

    $details = $orders_details->fetchAll(PDO::FETCH_ASSOC);

    $products_details[]=$details;

    for($i=0; $i <count($details);$i++ ){

        $products = $dbconn->get_data("*","products","id ='{$details[$i]['product_id']}'");

        $products_details[]= $products->fetchAll(PDO::FETCH_ASSOC);
    }

    $json_orders = json_encode($products_details);

    echo $json_orders ;

}



// status point 
if(isset($_GET['status']) && isset($_GET['date'])){
    $update_status= $dbconn->updatedata('orders'," status = '0' ","date='{$_GET['date']}'");
    echo "1";

}


?>