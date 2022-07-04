<?php
require_once("../inc/database.php");
$db = new DB();
$sql = $db->get_connect()->query("SELECT  products.id, products.name ,products.price ,products.image,categories.category 
FROM categories INNER JOIN products ON products.category_id=categories.id");
$result=$sql->fetchAll();
//var_dump($result);
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Cafeteria</title>
  <style>
    #btn {
      color: blue;
      width: 6.5rem;
      border: none;
      background-color: transparent;
    }

    a {
      text-decoration: none;

    }
  </style>

</head>

<body>
  <!-- start navbar-->


  <?php require_once("../inc/nav_admin.php"); ?>

  <!-- end navbar-->


  <!-- header -->
  <div class="row">
    <div class="col-8">
      <h3 class="mt-2">All products</h3>
    </div>
    <div class="col-4 mt-3">
      <a href="add_product.php">add product</a>
    </div>
  </div>


  <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show w-50 m-auto mt-2" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>

      <?php echo $_GET['error']; ?>
    </div>
  <?php } ?>
  <?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success alert-dismissible fade show text-center w-50 m-auto mt-2" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>

      <?php echo $_GET['success']; ?>
    </div>
  <?php } ?>


  <!--start table -->

  <table class="table table-striped table-hover w-75 m-auto mt-3">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">image</th>
        <th scope="col">category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
      <?php foreach ($result as $key => $product) { ?>
        <tr>
          <td scope="row"><?php echo $product['name'] ?></td>
          <td><?php echo $product['price'] ?></td>
          <td> <img width="100" height="90" src="../uploads/<?php echo $product['image'] ?>"></td>
          <td><?php echo $product['category'] ?></td>
          <td><button value="<?php echo $product['id'] ?>" class="btn">avaliable</button> <a href="edit_product.php?id=<?php echo $product['id']; ?>">edit</a> <a href="handle_deleteProduct.php?id=<?php echo $product['id']; ?>">delete</a></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>



  <!--end table -->


  <!--  Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="product_avaliable.js">
  </script>


</body>

</html>