<?php 
require_once("../inc/database.php");
$db=new DB();
/**SElect user for order */
$sql=$db->get_data('*','user','role=2');
$users=$sql->fetchAll();
//var_dump($users);
  
/** start SElect categories  that have products*/
$sql_cat = $db->get_connect()->query("SELECT  Distinct  categories.id ,categories.category 
FROM categories INNER JOIN products ON products.category_id=categories.id");
$categories=$sql_cat->fetchAll();


/** end SElect categories */

 
/** start SElect products  that have status avaliable*/
$sql_products =$db->get_data("*","products","status='1'");
$result=$sql_products->fetchAll();


/** end SElect categories */

/**start display products  in order*/
$sql_inCart =$db->get_data("*","carts",);
$prods_cart=$sql_products->fetchAll();
/**end display products  in order*/



?>
 