<?php
require_once("../inc/database.php");


$db = new DB();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $db->get_data('*', 'products', 'id=' . $id);
    $result=$data->fetch(PDO::FETCH_ASSOC);
     //var_dump($result) ;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Cafeteria</title>
    <style>
        #img_container {
            width: 150px;
            height: 100px;
            margin: auto;
        }
    </style>

</head>

<body>
    <!-- start navbar-->

    <?php require_once("../inc/nav_admin.php"); ?>

    <!-- end navbar-->
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
    <!-- edit form start -->


        <form class="w-50 m-auto mt-5" action="handle_addProduct.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nameFormControlInput1" class="form-label">name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" id="nameFormControlInput1">
                <input type="hidden" value="<?php echo $result['id']; ?>" name="id" />
            </div>
            <div class="mb-3">
                <label for="priceFormControlInput2" class="form-label">price</label>
                <input type="text" class="form-control" name="price" value="<?php echo $result['price'] ?>" id="priceFormControlInput2">
            </div>
            <div class="mb-3">
                <div id="img_container">
                <img src="../uploads/<?php echo $result['image'] ?>" width="150" height="100">

                </div>
                <label for="formFile" class="form-label">product image</label>
                <input class="form-control" type="file" name="my_image" id="formFile">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="submitEdit" type="submit">Submit form</button>
                <button class="btn btn-primary" type="reset">Reset form</button>
            </div>
        </form>
    
    <!-- edit form end -->