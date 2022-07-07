<?php
require_once("handle_admin.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Cafeteria</title>
    <link href="../css/index.css" rel="stylesheet">
    <style>
        .counter {
            display: flex;
        }

        .counter .product_quant,
        .counter .value-button {
            width: 50px;
            height: 40px;
            margin: 10px;
            text-align: center;
        }

        .cont {
            display: flex;
        }
    </style>

</head>

<body>
<?php require_once("../inc/nav_admin.php"); ?>
    <div class="row">
        <section class="left_side  mt-0 col-4" style="width:32%;">
            <form class="row g-3" style="margin: 20px 10px;">

                <div class="container bg-dnager">
                    <div class="raw" id="product_data">

                    </div>

                </div>


                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea " style="height: 100px;" required></textarea>
                        <label for="floatingTextarea">Notes</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="inputCategory" class="form-label">Rooms</label>
                    <select id="inputCategory" class="form-select" id="rooms" required>
                        <option value="">select Room</option>
                        <?php foreach ($room_res as $key => $room) { ?>

                            <option value="<?php echo $room['room'] ?>"><?php echo $room['room']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="inputCategory" class="form-label">EXT</label>
                    <select id="inputCategory" class="form-select" id="exts" required>
                        <option value="">select Ext</option>
                        <?php foreach ($ext_res as $key => $ext) { ?>

                            <option value="<?php echo $ext['EXT']; ?>"><?php echo  $ext['EXT']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <hr>
                <div class="col-md-8"></div>

                <div class="col-md-4">
                    <input type="text" class="form-control" value="Total" id="total_Price" placeholder="Enter Product Name" readonly>
                </div>

                <div class="col-3">
                    <button type="submit" id="submit" class="btn btn-primary" style="width: 120px;margin-bottom: 10px;">Confirm</button>
                </div>

            </form>
        </section>

        <section class="right_side  col-8 " style="width:60%; ">

            <!--start select user -->

            <div class="row g-3 mt-2">
                <p>add to user</p>
                <select class="form-select " id="users" required>
                    <option value="">select user</option>

                    <?php foreach ($users as $key => $user) { ?>

                        <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!--end select user -->

            <!--===================================================================================================== -->
            <!-- products-->

            <hr class="mt-5 ">
            <!--start display products -->
            <?php foreach ($categories as $key => $category) { ?>
                <div class="main ">
                    <h3 class="category"><?php echo $category['category']; ?></h3>

                    <?php foreach ($result as $key => $products) { ?>
                        <?php if ($category['id'] == $products['category_id']) { ?>
                            
                                <div class="product col-3 " style="display:inline-block">
                                    <img class="product_img" width="100" height="100" src="../uploads/<?php echo $products['image']; ?>" value="<?php echo $products['id']; ?>" alt="product img">

                                    <h4><?php echo $products['name']; ?></h4>
                                    <h5><?php echo $products['price']; ?> </h5>

                                </div>
                            

                        <?php } ?>




                    <?php } ?>
                </div>
            <?php } ?>
            <!--end display products -->


        </section>
    </div>



    <!--  Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../js/admin_order.js">

    </script>
</body>


















</html>