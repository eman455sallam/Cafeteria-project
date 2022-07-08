<?php
require_once("../inc/database.php");
$db=new DB();
$connections= $db->get_connect();
 try{
    
      $data=$connections->query("SELECT * FROM categories,products  WHERE categories.id=products.category_id ");
      $products= $data->fetchAll(PDO::FETCH_ASSOC);
     
      $data2=$connections->query("SELECT products.category_id ,categories.category,categories.id  FROM products ,categories where products.category_id=categories.id group by category_id ");
      $categories= $data2->fetchAll(PDO::FETCH_ASSOC);
 }catch(PDOException $e)
 {
     var_dump($e->getMessage());
 }
   

 //rolls and ext
 try{
    
    $all_users=$connections->query("SELECT * FROM user");
    $users= $all_users->fetchAll(PDO::FETCH_ASSOC);
   
    

  //   var_dump($products);
}catch(PDOException $e)
{
   var_dump($e->getMessage());
}


 
?>