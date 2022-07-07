<?php 

 require_once("../inc/database.php");

 $pro_avaliable=$_POST['avaliable_status'];

  echo $pro_avaliable;

 $db=new DB();
 
 if(isset($_POST['prod_id'])){
  $id=$_POST['prod_id'];
  echo $id;
  if($pro_avaliable=="avaliable"){
    $db->updatedata('products',"status='1'","id={$id}");


 }elseif($pro_avaliable=="not avaliable"){
    $db->updatedata('products',"status='0'","id={$id}");
 }
 }
