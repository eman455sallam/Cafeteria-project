<?php require_once("handle_admin.php"); ?>
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


</head>

<body>

    
    <div class="row">
        <section class="left_side  mt-0 col-4" style="width:32%;">
            <form class="row g-3" style="margin: 20px 10px;">
                
                <div class="col-md-12">
                    <h4 class="product">Tea</h4>
                    <div class="counter">
                        <div class="value-button" id="decrease" value="Decrease Value">-</div>
                        <input type="number" id="number" value="0" />
                        <div class="value-button" id="increase" value="Increase Value">+</div>
                    </div>
                    <h4 style="display:inline-block;">EGP 25</h4>
                </div>

               




                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Notes</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="inputCategory" class="form-label">Rooms</label>
                    <select id="inputCategory" class="form-select">
                        <option selected>Choose...</option>
                        <option>222222</option>
                        <option>777777</option>
                        <option>888888</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="inputCategory" class="form-label">EXT</label>
                    <select id="inputCategory" class="form-select">
                        <option selected>Choose...</option>
                        <option>2</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </div>
                <hr>
                <div class="col-md-8"></div>

                <div class="col-md-4">
                    <input type="text" class="form-control" value="55 EGP" id="inputProduct" placeholder="Enter Product Name" readonly>
                </div>

                <div class="col-3">
                    <button type="submit" class="btn btn-primary" style="width: 120px;margin-bottom: 10px;">Confirm</button>
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
                        <div class="row mb-3 ">
                            <?php if ($category['id'] == $products['category_id']) { ?>
                                <div class="product col-3 bg-info">
                                    <img class="product_img" width="100" height="100" src="../uploads/<?php echo $products['image']; ?>" value="<?php echo $products['id']; ?>" alt="product img">

                                    <h4><?php echo $products['name']; ?></h4>
                                    <h5><?php echo $products['price']; ?> </h5>

                                </div>
                            <?php } ?>

                        </div>


                    <?php } ?>
                </div>
            <?php } ?>
            <!--end display products -->


        </section>
    </div>



    <!--  Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        window.addEventListener("load", function() {

            let users = document.getElementById("users");
            let products = document.getElementsByClassName("product_img");







            for (var i = 0; i < products.length; i++) {
                products[i].onclick = (event) => {
                    if (users.selectedIndex == 0) {
                        alert('select user');
                    } else {

                        var user_id = users.options[users.selectedIndex].value;
                        var product_id = event.target.getAttribute('value');
                        var quantity =1;
                       //start ajax post 
                        $.ajax({
                            url: "user_selectedProd.php",
                            method: "post",
                            data: {
                                user_id:user_id ,
                                prod_id: product_id,
                                prod_quant:quantity

                            },
                            success: function(res) {
                                
                                //console.log(res);
                            }

                        })
                     //end ajax post 
                    //start ajax get
                    $.ajax({
                            url: "handle_admin.php",
                            method: "get",
                            dataType:"json",
                            success: function(res) {

                                console.log(res);
                            }

                        })

                    //end ajax get 




                    }





                }
            }




        })
    </script>
</body>


















</html>