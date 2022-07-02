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
  <!-- add category form -->
<form class="row g-3" style="width: 80%;margin: 20px 355px;" method="post" action="./handle_addCategory.php">
  <div class="col-md-6">
    <label for="inputProduct" class="form-label">Category Name</label>
    <input type="text" class="form-control" name="categoryName" id="inputProduct" placeholder="Enter Category Name">
    <span class="error"><?php echo (isset($errors['categoryName'])? $errors['categoryName']:"" ); ?></span>

  </div>

  <div class="col-md-6"></div>

  <div class="col-3">
    <button type="submit" class="btn btn-primary" style="width: 100px;"  name="addCategory">Save</button>
  </div>

  <div class="col-3">
    <button type="reset" class="btn btn-primary" style="width: 100px;">Reset</button>
  </div>

</form>
</section>
<!-- end add category form -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


















</html>