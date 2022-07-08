<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jquery  -->
    <!-- <script src="js/jquery.min.js"></script> -->
    <!-- font awsom  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Cafeteria</title>
</head>
<body>
<?php
  require  '../inc/nav_admin.php';
?>
<div class="container parent_container">
    <div class="date_inputs_container">
        <h1 class="mb-4 h1"> Orders</h1>
        <!-- <input type="datetime-local" class="ml-5" name="first_date" id="first_date"> -->
        <!-- <input type="datetime-local" name="second_date" id="second_date"> -->
    </div>
<table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">Order Date</th>
      <th scope="col">Name</th>
      <th scope="col">Room</th>
      <th scope="col">EXT</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="printData">
  <!-- fetch all data from data ase  -->
  <?php
  
  require "../inc/database.php";
  try{
    // select date,orders.status,user.name as username,orders.EXT,orders.room,products.name as productname,products.price,products.image,total_amount,count from orders ,user,users_orders,products where orders.user_id = user.id and orders.id = users_orders.order_id and users_orders.product_id = products.id and orders.status = '3';
    $db_object = new DB ();

    $columns = "date,orders.status,user.name as username,orders.EXT,orders.room,products.name as productname,products.price,products.image,total_amount,count,orders.id as order_id";

    $tables_name = "orders ,user,users_orders,products";
    $condition = "orders.user_id = user.id and orders.id = users_orders.order_id and users_orders.product_id = products.id and orders.status = '1' group by users_orders.order_id ";

    // $condition ="INNER JOIN product_order As Hell ON orders.user_id = 1";
    // SELECT * FROM orders INNER JOIN product_order As Hell ON orders.user_id = 1
    // SELECT * FROM orders INNER JOIN product_order As Hell ON orders.user_id = 1

  $allrows = $db_object->get_data($columns,$tables_name,$condition);  

  $result = $allrows->fetchAll(PDO::FETCH_ASSOC);
  // SELECT * FROM users_orders,products WHERE users_orders.order_id=4 AND users_orders.product_id =products.id
foreach($result as $key=>$value){
  echo "<tr>
  <td>{$value['date']}</td>
  <td>{$value['username']}</td>
  <td>{$value['room']}</td>
  <td>{$value['EXT']}</td>
  
  <td>".($value['status'] == '1'?'<a> delivery</a>':'' )."</td>
</tr>
<tr>
<td colspan='4'> </td>
</tr>";


  $col='*';
  $tables = " users_orders,products";
  $wh = "users_orders.order_id={$value['order_id']} AND users_orders.product_id =products.id";
  $order_details = $db_object->get_data($col,$tables,$wh);  

  $data = $order_details->fetchAll(PDO::FETCH_ASSOC);



  foreach($data as $e=>$d){
    $price = $d['price'] * $d['count'];
    echo "<tr>
    <td colspan='5'><div class='card' style='width: 18rem;'>
    <img class='card-img-top' src='...' alt='Card image cap'>
    <div class=card-body'>
      <p class='card-text'>price:{$price}<br> count: {$d['count']}</p>
    </div>
  </div></td>
    </tr>";

  }

  echo "<pre>";
  print_r($data);
  echo "</pre>";
  

}

  }catch(PDOException $e){
    var_dump($e->getMessage());
  }
  
  
  ?>  











  </tbody>
</table>
<div>
<div class="n">
  
<div class="card" id="product_card" style="width: 18rem;">
<div class="card">
 <!-- <div class="card-image cap">card image</div>
  <div class="card-image cap">card image</div>
  <div class="card-image cap">card image</div>
</div> -->

  <!-- <img class="card-img-top" src=".." alt="Card image cap"> -->
  <!-- <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div> -->
</div>
</div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/main.js" ></script>
    <script src="../js/second.js"></script>
</body>


















</html>