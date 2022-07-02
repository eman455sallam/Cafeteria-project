<?php
require_once("../inc/database.php");


$db=new DB();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result =$db->get_data('*','products','id='.$id);
  
}

?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cafeteria</title>

</head>

<body>
    <!-- start navbar-->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cafeteria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all_products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_users/all_users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin.php">Manual Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_checks/all_checks.php">Checks</a>
                    </li>
                </ul>
                <img src="<?php echo $_SESSION['admin_img']; ?>" height="80px" width="80px" style="margin-right:20px ;"> <span>Admin</span>
            </div>
        </div>
    </nav>

    <!-- end navbar-->

    <!-- edit form start -->
    <div class="alert alert-danger w-50 m-auto mt-2" role="alert">
        A simple danger alert—check it out!
    </div>
    <?php foreach ($result as $key => $row){?>
    <form class="w-50 m-auto mt-2" action="handle_edit.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nameFormControlInput1" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" id="nameFormControlInput1">
            <input type="hidden" value="<?php echo $row['id'] ;?>" name="id" />
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput2" class="form-label">price</label>
            <input type="text" class="form-control" name="price" value="<?php echo $row['price']?>" id="priceFormControlInput2">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">product image</label>
            <input class="form-control" type="file"  name="my_image" id="formFile">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
            <button class="btn btn-primary" type="reset">Reset form</button>
        </div>
    </form>
    <?php }?>
    <!-- edit form end -->