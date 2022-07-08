<?php
require_once('../inc/database.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $db=new DB();
    $connections= $db->get_connect();
    try{
        $data=$connections->query("delete from carts where id='{$_GET['id']}'");
    }catch(PDOException $e){
        var_dump($e->getMessage());
    }
    header("location:./user.php");
    }
?>