<?php 

 require_once("../inc/database.php");

 $db=new DB();
 
 if(isset($_POST['prod_id'])  and isset($_POST['user_id']) and  isset($_POST['prod_quant']) ){
  
 $user_id=$_POST['user_id'];
 $prod_id=$_POST['prod_id'];
 $quantity=$_POST['prod_quant'];

//   echo $user_id;
//  echo $prod_id;
//  echo $quantity;
 try{
    
 $db->insertdata('carts',"user_id,product_id,quantity","'{$user_id}','{$prod_id}','{$quantity}'");
 }catch(PDOException $e){     var_dump($e);
 }

 }
 ?>