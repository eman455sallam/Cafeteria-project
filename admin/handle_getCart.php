<?php
require_once("../inc/database.php");
$db=new DB();

if(isset($_GET['user_id'])){
  $user_id=$_GET['user_id'];
//echo $user_id;

$arr[]=array("eman"=>$user_id);
//echo json_encode($arr);
 

$sql_inCart = $db->get_connect()->query("SELECT DISTINCT carts.product_id ,carts.quantity ,products.name ,products.price FROM `carts`
                                     INNER  JOIN `products`
                                     WHERE carts.user_id='$user_id' and carts.product_id=products.id");

 




    $prods_cart=$sql_inCart->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($prods_cart);
    // foreach($prods_cart as $key=>$value){

    //  $prod_id= $value['prod_id'];
    //  $quant= $value['quantity'];
    //  $prod_name= $product['name'];
    //  $prod_price= $product['price'];
     
   

    //  $return_array[]=array(
    //     "prod_id" => $prod_id,
    //     "prod_name" => $prod_name,
    //     "prod_price" =>$prod_price,
    //     "prod_quantity" =>$quant

    //  );

    //  }

    //  echo json_encode($return_array);

     
    
}
    



?>