<?php
require_once("../inc/database.php");

    $product_id=$_POST['productID'];
    $user_id=$_POST['userID'];
    $price=$_POST['ProductPrice'];
    $quantity=0;
    $total=0;
    //total decrease price
    try{
   
        $db=new DB();
        $connections= $db->get_connect();
        $data2=$connections->query("select carts.product_id,carts.user_id,quantity,products.name,products.price from products,carts 
        where products.id=carts.product_id AND carts.user_id='{$_POST['userID']}'");
        $carts=$data2->fetchall(PDO::FETCH_ASSOC);
        foreach($carts as $cart){
            $total -= $cart['price']*$cart['quantity'];
        }
        echo  "<input type='text class='form-control' name=total value='{$total}' id='inputProduct' placeholder='Enter Product Name'>";
    

    }catch(PDOException $e){
        var_dump($e->getMessage());
        }
    
    
  
  

  
  ?>