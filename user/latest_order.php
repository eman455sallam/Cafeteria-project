
<?php
require_once("../inc/database.php");
// var_dump($_POST);

$db=new DB();
$connections= $db->get_connect();
try{
$latest_orders=$connections->query("SELECT products.id,products.name,products.price,products.image
      FROM products ,orders,users_orders 
      WHERE orders.id=users_orders.order_id AND orders.user_id='{$_COOKIE['id']}' AND products.id=users_orders.product_id group by products.id ");
      $latest_order= $latest_orders->fetchAll(PDO::FETCH_ASSOC);
   
    }catch(PDOException $e)
    {
        var_dump($e->getMessage());
    }