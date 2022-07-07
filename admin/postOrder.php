<?php
require_once("../inc/database.php");
$db=new DB();



    $user_id=$_POST['user_id'];
    $total=$_POST['total'];
    $room=$_POST['room'];
    $ext=$_POST['ext'];
    $note=$_POST['note'];
   
   
   
   
     echo $user_id;
  
    try{
       
    $db->insertdata('orders'," date, room, EXT, user_id, notes, total_amount, status","'20-20-200','{$room}','{$ext}','{$user_id},'{$note},'{$total},'1'");
    }catch(PDOException $e){     
        var_dump($e);
    }

?>