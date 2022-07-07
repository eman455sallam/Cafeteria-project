<?php 
require_once("../inc/database.php");
$db=new DB();

if(isset($_POST['prod_id'])  and isset($_POST['user_id']) and  isset($_POST['prod_quant']) ){

    $sql_inCart = $db->get_connect()->query("UPDATE `carts` SET `quantity`='{$_POST['prod_quant']}' WHERE product_id='{$_POST['prod_id']}' and user_id='{$_POST['user_id']}'");

}
?>