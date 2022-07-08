<?php
require_once("../inc/database.php");
if(isset($_POST['product_id']))
  {
    $product_id=$_POST['product_id'];
    $user_id=$_POST['user_id'];
    $product_name=$_POST['item_name'];
    $price=$_POST['item_price'];
    $quantity=$_POST['quantity'];
    $total=0;
    // store order in cart
    try{
        $db=new DB();
        $connections= $db->get_connect();
        $carts=$connections->query("select product_id ,user_id ,quantity from carts where product_id=$product_id AND user_id='{$_COOKIE['id']}'");
       $cart=$carts->fetchAll(PDO::FETCH_ASSOC);
    //    var_dump($cart);
        if(!$cart){
        $data=$db->insertdata("carts", "product_id,user_id,quantity", "'{$product_id}','{$user_id}',1");
        $data2=$connections->query("select carts.product_id,carts.user_id,quantity,products.name,products.price,carts.id from products,carts 
        where products.id=carts.product_id AND carts.user_id='{$_POST['user_id']}'");
        $all=$data2->fetchall(PDO::FETCH_ASSOC);
        // echo($all);
        foreach($all as $value){
            $total += $value['price']*$value['quantity'];
            setcookie("total",$total,time() + 2 * 24 * 60 * 60 *3000);

            echo "<h4 class='product'>{$value['name']}</h4><div class='counter'><div class='value-button decrease' onclick='decrease({$value['product_id']})'  value='Decrease Value' >-</div><input min='1' type='button' id='number' value='{$value['quantity']}' /><div class='value-button increase'   value='Increase Value' onclick=cart({$value['product_id']})  >+</div></div><h4 style='display:inline-block;'>{$value['price']} EPG</h4><a class='delete' href='delete_item.php?id={$value['id']}'>X</a>";
            echo"<input type='hidden' value={$value['price']} id='price_{$value['product_id']}'>";
            echo "<input type='hidden' value={$value['name']} id='name_{$value['product_id']}'>";
            echo "<input type='hidden' value={$user_id} id='user_id'>";
            echo"<input type='hidden' name='prod_id[]' value='{$value['product_id']}'>";
            echo"<input type='hidden' name='count[]' value='{$value['quantity']}'>";
            echo"<input type='hidden' value='1' id='quantity{$value['product_id']}'>";
        }
       
    }else{
        $quantity=$quantity+$cart[0]['quantity'];
        $data=$connections->query(" update carts set quantity=$quantity where product_id=$product_id");
        $data2=$connections->query("select carts.product_id,carts.user_id,quantity,carts.id,products.name,products.price from products,carts 
        where products.id=carts.product_id AND carts.user_id='{$_POST['user_id']}'");
        $all=$data2->fetchall(PDO::FETCH_ASSOC);
        // var_dump($all);
        foreach($all as $value){
            $price_value=$value['price'] * $value['quantity'];
            $total += $value['price']*$value['quantity'];
            setcookie("total",$total,time() + 2 * 24 * 60 * 60 *3000);

            echo "<h4 class='product'>{$value['name']}</h4><div class='counter'><div class='value-button decrease'   value='Decrease Value' onclick='decrease({$value['product_id']})'>-</div><input min='1' type='button' id='number' value='{$value['quantity']}' /><div class='value-button increase'  value='Increase Value' onclick=cart({$value['product_id']}) >+</div></div><h4 style='display:inline-block;'>{$price_value} EPG</h4><a class='delete' href='delete_item.php?id={$value['id']}'>X</a>";
            echo"<input type='hidden' name='prod_id[]' value='{$value['product_id']}'>";
            echo"<input type='hidden' value={$value['price']} id='price_{$value['product_id']}'>";
            echo "<input type='hidden' value={$value['name']} id='name_{$value['product_id']}'>";
            echo "<input type='hidden' value={$user_id} id='user_id'>";
            echo"<input type='hidden' name='count[]' value='{$value['quantity']}'>";
            echo"<input type='hidden' value='1' id='quantity{$value['product_id']}'>";
        }
        }
    

    }catch(PDOException $e){
        var_dump($e->getMessage());
        }
    
    
  }
  

  
  ?>