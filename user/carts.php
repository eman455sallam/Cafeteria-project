<?php
require_once('../inc/database.php');
$user_id=$_COOKIE['id'];
try{      
    $db=new DB();
    $connections= $db->get_connect();
    $data=$connections->query("select carts.product_id,carts.user_id,quantity,carts.id,products.name,products.price from products,carts 
    where products.id=carts.product_id AND carts.user_id='{$_COOKIE['id']}'");
    $all=$data->fetchall(PDO::FETCH_ASSOC);

    // echo($/all);
  

// exit();	

}catch(PDOException $e){
    var_dump($e->getMessage());
    }



   
?>