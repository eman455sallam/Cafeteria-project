<?php
require_once("../inc/database.php");
// var_dump($_POST);


$db=new DB();
$connections= $db->get_connect();
$errors=[];
    if($_POST['rooms'] == "" ){
        $errors['rooms'] = "please insert your room";
      }

    if($_POST['exts'] == "" ){
        $errors['exts'] = "please insert your exts";
      }
         
      if(count($errors)>0){
        session_start();
        $_SESSION['errors']=$errors;
        header("location:./user.php");  
        }else{
        try{
        session_start();
        session_destroy();  
    
    $order=$db->insertdata("orders", "room,EXT,user_id,notes,total_amount", "'{$_POST['rooms']}','{$_POST['exts']}','{$_COOKIE['id']}','{$_POST['notes']}','{$_POST['total']}'");
    $userOrder=$connections->query("select *from ORDERS where id=(SELECT LAST_INSERT_ID());");
    $results=$userOrder->fetchColumn();

    $cart=$connections->query("select * from carts where user_id='{$_COOKIE['id']}'");
    $carts=$cart->fetchAll(PDO::FETCH_ASSOC);
    $products=$_POST['prod_id'];
    $counts=$_POST['count'];
    
        for($i=0;$i<count($products);$i++){
                    
           $product=$db->insertdata("users_orders", "product_id,order_id,count", "'{$_POST['prod_id'][$i]}','{$results}','{$_POST['count'][$i]}'");
                       $delcart=$connections->query("delete from carts where user_id={$_COOKIE['id']} AND product_id='{$_POST['prod_id'][$i]}'");
                }
        
        
                header("location:./user.php");
   
 }catch(PDOException $e)
 {
     var_dump($e->getMessage());
 }}




?> 