<?php
require_once("../inc/database.php");


$db = new DB();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data =$db->get_connect()->query("SELECT products.id as prod_id,  products.name ,products.price ,products.image,categories.id as cat_id,categories.category 
    FROM categories INNER JOIN products ON products.category_id=categories.id");
    $result = $data->fetch(PDO::FETCH_ASSOC);
    //var_dump($result) ;

    $cats=$db->get_data('*','categories');
    $categories=$cats->fetchAll();

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

        .error {
            color: red;
        }
    </style>

</head>

<body>
    <!-- start navbar-->

    <?php require_once("../inc/nav_admin.php"); ?>

    <!-- end navbar-->

    <!-- edit form start -->


    <form class="w-50 m-auto mt-5" action="handle_editProduct.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nameFormControlInput1" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" id="nameFormControlInput1" required>
            <input type="hidden" value="<?php echo $result['prod_id']; ?>" name="id" />
            <span><?php if (isset($_GET['name_error'])) {
                        echo ($_GET['name_error']);
                    } ?></span>

        </div>
        <div class="mb-3">
            <label for="priceFormControlInput2" class="form-label">price</label>
            <input type="text" class="form-control" name="price" value="<?php echo $result['price'] ?>" id="priceFormControlInput2" required>
            <span class="error"><?php if (isset($_GET['price_error'])) {
                                    echo $_GET['price_error'];
                                } ?></span>
        </div>
        <div class="mb-3">
            <label for="categoryFormControlInput2" class="form-label">category</label>
            <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg " name="category">
                <option  selected Disabled secondary><?php echo $result['category']; ?></option>
               <?php  foreach($categories as $key=>$category) {?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
                  <?php } ?>
            </select>

        </div>
        <div class="mb-3">
            <div id="img_container">
                <img src="../uploads/<?php echo $result['image'] ?>" width="150" height="100">

            </div>
            <label for="formFile" class="form-label">product image</label>
            <input class="form-control" type="file" name="my_image" id="formFile" required>


        </div>

        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
            <button class="btn btn-primary" type="reset">Reset form</button>
        </div>
    </form>

    <!-- edit form end -->