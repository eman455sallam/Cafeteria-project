<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="js/jquery.min.js"></script>
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
      // var_dump($_SESSION['errors']); 
      $errors=$_SESSION['errors'];

    }
    ?>
<body>
  <!-- navbar -->
  <?php include("../inc/nav_user.php")?>

<section>
  <!-- end navbar -->
  
    <!-- add product form -->
<form class="row g-3" style="margin: 20px 355px;" method="post" action="./handle_addProduct.php" enctype="multipart/form-data" >
  <div class="col-md-12">
    <label for="inputProduct" class="form-label">Product</label>
    <input type="text" class="form-control" name="productName" id="inputProduct" placeholder="Enter Product Name">
    <span class="error"><?php echo (isset($errors['productName'])? $errors['productName']:"" ); ?></span>

  </div>
  

  <div class="col-md-12">
    <label for="inputPrice" class="form-label">Price</label>
    <input type="number" class="form-control" id="inputPrice" name="price">
    <span class="error"><?php echo (isset($errors['price'])? $errors['price']:"" ); ?></span>
  </div>

  
  <div class="col-md-8">
    <label for="inputCategory" class="form-label">Category</label>
    <select id="inputCategory" class="form-select" name="category">
      <option selected value="">Choose...</option>
      <?php include( '../admin_category/handle_addCategory.php');?>
      <?php foreach($categories as $category){
     echo" <option value='{$category['id']}'>{$category['category']}</option>";
       } ?>
    </select>
    <span class="error"><?php echo (isset($errors['category'])? $errors['category']:"" ); ?></span>
  </div>

  <div class="col-md-4">
    <a href="../admin_category/add_category.php" style="margin-top: 33px;display: inline-block;">Add category</a>
  </div>

  <div class="mb-3 col-md-12">
    <label for="formFile" class="form-label">Product Picture</label>
    <input class="form-control" type="file" id="formFile" name="image">
    <span class="error"><?php echo (isset($errors['image'])? $errors['image']:"" ); ?></span>
  </div>


  <div class="col-md-6">
    <button type="submit" class="btn btn-primary" style="width:50%" name="AddProduct">Save</button>
  </div>

  <div class="col-md-6">
    <button type="reset" class="btn btn-primary" style="width:50%">Reset</button>
  </div>
</form>
</section>
<!-- end add product -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


















</html>