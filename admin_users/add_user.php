

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="CSS/bootstrap.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/stylealiaa.css" rel="stylesheet" />
    
    <title>Document</title>
    <style>
        span{
    display: none;
    color: red
}p{
  color:red;
}
.greenColor{
    border:3px solid rgb(35, 212, 35);
}
    </style>
</head>
<body>
<?php 
 session_start();
?>
<!-- nav bar   -->
<?php include("../inc/nav_admin.php")?>


    <section class="vh-100 bg-image" >
  <!-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> -->
  <div class="mask d-flex align-items-center h-100" >
    <div class="container h-100 mt-5" style="width: 100%;" >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h4 class="text-uppercase text-center mb-5">Register </h4>

              <form action="handle_addUser.php" method="post"  enctype='multipart/form-data' class="needs-validation"  >

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                 
                  <span name="name" id="name_span">user name [4-18] characters which contains letters and numeric digits </span> 
                  <?= (isset($_SESSION['errors']['valid_name']))? $_SESSION['errors']['valid_name']:''?> 

                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                  
                  <span name="email" id="email_span">Email is invalid</span> </td>
                  <?= (isset($_SESSION['errors']['valid_email']))? $_SESSION['errors']['valid_email']:''?> 

                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                  
                  <span name="pass_span" id="pass_span">[6 to 16 ] characters which contain at least one special character, numeric digits,
                    letters</span>
                    <?= (isset($_SESSION['errors']['length_pass']))? $_SESSION['errors']['length_pass']:''?> 

                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <input type="password" name="Pass_confirm" id="form3Example4cdg" class="form-control form-control-lg" />
                  
                  <span name="pass_conf_span" id="pass_conf_span">your Password is invalid</span>
                  <?= (isset($_SESSION['errors']['not_matched']))? $_SESSION['errors']['not_matched']:''?> 

                </div>



                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example5cg">Room No</label>
                    <input type="number"  name="room" id="form3Example5cg" class="form-control form-control-lg" />
                   
                    <span name="room_span" id="room_span">Enter Valid Number </span> 
                    <?= (isset($_SESSION['errors']['valid_room']))? $_SESSION['errors']['valid_room']:''?> 

                  </div>



                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example6cg">EXt</label>
                    <input type="number" name="ext" id="form3Example6cg" class="form-control form-control-lg" />
                   
                    <span name="ext_span" id="ext_span">Enter Valid Ext </span> 
                    <?= (isset($_SESSION['errors']['valid_ext']))? $_SESSION['errors']['valid_ext']:''?> 

                  </div>


                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example7cg">Image</label>
                    <input type="file" name="image" id="form3Example7cg" class="form-control form-control-lg" />
                   
                    <span name="img_span" id="img_span">Enter Valid image </span> 
                    <?= (isset($_SESSION['imgerrors']['image_extention']))? $_SESSION['imgerrors']['image_extention']:''?> 
                    <?= (isset($_SESSION['imgerrors']['image_size']))? $_SESSION['imgerrors']['image_size']:''?> 
                     
                   
                  </div>

               

                <div class="d-flex justify-content-evenly">
                  <button type="submit" name="register"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                    <button type="reset"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reset</button>
                </div>

                

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="../js/script.js"></script>
</body>
</html>