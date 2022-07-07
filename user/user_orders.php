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
  require  '../inc/nav_user.php';
?>
<div class="container parent_container">
    <div class="date_inputs_container">
        <h1 class="mb-4 h1"> My Orders</h1>
        <input type="datetime-local" class="ml-5" name="first_date" id="first_date">
        <input type="datetime-local" name="second_date" id="second_date">
    </div>
<table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">Order Date</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="printData">
  <!-- fetch all data from data ase  -->
  <?php
  
  require "../inc/database.php";
  try{
    $db_object = new DB ();
  $allrows = $db_object->get_data("*","orders","1");  
  $result = $allrows->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($result as $key=>$value){
    
    echo $value['id'];
      echo "<tr>
              <td>{$value['date']}</td>
              <td>".($value['status'] == '0'?'canceled':($value['status'] == '1'?'processing':($value['status'] == '2'?'out of delivery':($value['status'] == '3'?'done':''))) )."</td>
              <td>{$value['total_amount']}</td>
              <td>".($value['status'] == '1'?'<a> cancel</a>':'' )."</td>
            </tr>";
              
  }
  
  }catch(PDOException $e){
    var_dump($e->getMessage());
  }
  
  
  ?>  

  </tbody>
</table>
<div>
<div class="d-flex flex-row justify-content-evenly" id="product_card">
  
<!-- <div class="card" id="product_card" style="width: 18rem;"> -->

  <!-- <img class="card-img-top" src=".." alt="Card image cap"> -->
  <!-- <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div> -->
<!-- </div> -->
</div>
<div id="total">
<?php 
$total = 0;
foreach($result as $key=>$value){
    
    // echo $value['id'];
$total += $value['total_amount'];         
  };
  echo "
  <p id='price'> total = EGP {$total}</p>
  ";
?>
</div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/main.js" ></script>
    <script src="../js/second.js"></script>
</body>


















</html>