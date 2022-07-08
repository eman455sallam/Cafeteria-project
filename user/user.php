<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cafeteria</title>
    <style>
   .error{
                color: red;
            }
  </style>
</head>
<?php
    session_start();
    if(isset(  $_SESSION['errors'])){
      $errors=$_SESSION['errors'];

    }
    ?>
<body>

<?php include("../inc/nav_user.php")?>
<?php include("./products_view.php")?>
<?php require("./carts.php")?>
<?php require("./latest_order.php")?>
<section class="left_side" style="width:32%;display:inline-block">
    <form class="row g-3" style="margin: 20px 10px;" method="post" action="./addOrder.php">

        <div class="col-md-12 products" id="total_items">
            <?php
            if($all){
             foreach($all as $value){
                $price_value=$value['price'] * $value['quantity'];
                echo "<h4 class='product' price='{$value['price']}' id='price{$value['product_id']}'>{$value['name']}</h4><div class='counter'><div class='value-button decrease'  onclick='decrease({$value['product_id']})' value='Decrease Value'>-</div><input type='button' id='number' value='{$value['quantity']}' /><div class='value-button increase'  value='Increase Value' onclick='cart({$value['product_id']});'>+</div></div><h4 style='display:inline-block;' id='price1{$value['product_id']}'>{$price_value} EPG</h4><a class='delete' href='delete_item.php?id={$value['id']}'>X</a>";
                echo"<input type='hidden' name='prod_id[]' value='{$value['product_id']}'>";
                echo"<input type='hidden' name='count[]' value='{$value['quantity']}'>";
            }
        }else{
            echo "<span class='error'>please insert your item</span>";
            ;
        }
            ?>
            
        </div>

        


        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name='notes' placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Notes</label>
            </div>
        </div>

        <div class="col-md-12">
                <label for="inputCategory" class="form-label">Rooms</label>
                    <select id="inputCategory" class="form-select" name='rooms'>
                        <option selected value="">Choose...</option>
                    <?php 
                    foreach($users as $user){
                       echo "<option value='{$user['room']}'>{$user['room']}</option>";
                    }
                        ?>
                    </select>
                    <span class="error"><?php echo (isset($errors['rooms'])? $errors['rooms']:"" ); ?></span>

        </div>

        <div class="col-md-12">
                <label for="inputCategory" class="form-label">EXT</label>
                    <select id="inputCategory" class="form-select" name='exts'>
                        <option selected value="">Choose...</option>
                        <?php 
                    foreach($users as $user){
                       echo "<option value='{$user['EXT']}' >{$user['EXT']}</option>";
                
                    }
                        ?>
                    </select>
                    <span class="error"><?php echo (isset($errors['exts'])? $errors['exts']:"" ); ?></span>

        </div>
        <hr>
            <div class="col-md-8"></div>

            <div class="col-md-2" id="total">
               <?php 
                if($all){
              echo  "<input type='text class='form-control' name='total' value='{$_COOKIE['total']}' id='inputProduct' placeholder='Enter Product Name'>" ;
                }else{
                    echo  "<input type='text class='form-control' value='0' id='inputProduct' placeholder='Enter Product Name'>" ;

                }
                ?> 
            </div>
                 <?php
                 echo "<div class='col-md-2'> EGP</div>";
                 ?>
            <div class="col-3">
                <button type="submit" class="btn btn-primary" style="width: 120px;margin-bottom: 10px;" name='submit'>Confirm</button>
            </div>

    </form>
</section>


<section class="right_side" style="width:60%;display:inline-block">
<div class="row g-3">
        <h4 style="text-align:center;font-weight: bold;">Latest Order</h4>
        <?php for($i=0;$i<count($latest_order);$i++) 
        echo"<div class='card col-md-3'><img src='../uploads/{$latest_order[$i]['image']}' class='card-img-top'><div class='card-body'><h4 class='card-text'>{$latest_order[$i]['name']} </h4><h5 class='card-text'>Price : {$latest_order[$i]['price']} EPG </h5></div></div>";
        ?>
        
    
    <hr>

<!-- products -->
<?php


foreach($categories as $category){
    echo "<h3 class='category'>{$category['category']}</h3>";
foreach($products as $product){
    if($category['id']== $product['category_id']){
       if($product['status']==1){

        echo "<div class='card col-md-3'>
            <img src='../uploads/{$product['image']}'  class='card-img-top addCart' onclick='cart({$product['id']});'>
            <div class='card-body'>
                <h5 class='card-text'>{$product['name']} </h5>
                <h5 class='card-text'>{$product['price']} EPG </h5>
            </div>
            <input type='hidden' value={$product['price']} id='price_{$product['id']}'>
            <input type='hidden' value={$product['name']} id='name_{$product['id']}'>
            <input type='hidden' value={$product['id']} id='product_id'>
            <input type='hidden' value={$_COOKIE['id']} id='user_id'>
            <input type='hidden' value='1' id='quantity{$product['id']}'>
        </div>";
    }
}
}
    }




?>
   
</div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="../js/order_user.js"></script>
    <link href="../css/index.css" rel="stylesheet">

</body>


















</html>