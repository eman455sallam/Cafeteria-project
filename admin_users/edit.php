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
    color: rgb(18, 221, 221);
}
.greenColor{
    border:3px solid rgb(35, 212, 35);
}
    </style>
   
<body>
<?php 
if(isset($_GET['id'])){

        try{
            require_once("../inc/database.php");
            $db = new DB();
            //  $connection=$db->get_connect();
            $data = $db->get_data("*","user","id={$_GET['id']}");
        //     $connection = new pdo("mysql:host=localhost;dbname=studentinfo" , "root" , "");
        
        //    $data = $connection->query("select * from student where id={$_GET['id']}");
            $result=$data->fetch(PDO::FETCH_ASSOC);
                //  var_dump($result);
                
                // header('location:update.php')
                
        
        } catch(PDOException $e){
            var_dump( $e->getMessage());
        }
}
?>


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
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Manual Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Checks</a>
              </li>
            </ul>
           <img src="../img/team-3-800x800.jpg" height="80px" width="80px" style="margin-right:20px ;"> <p>Admin:<?=" " . $_COOKIE['name']?></p>
          </div>
        </div>
      </nav>





    <section class="vh-100 bg-image" >
  <!-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> -->
  <div class="mask d-flex align-items-center h-100" >
    <div class="container h-100 mt-5" style="width: 100%;" >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h4 class="text-uppercase text-center mb-5">UPDATE </h4>

              <form action="handle_addUser.php" method="post"  enctype='multipart/form-data'  class="needs-validation"  >

                <div class="form-outline mb-4">
                  <label class="form-label" for="validationCustom03">Your Name</label>
                  <input type="text" name="name" id="form3Example1cg" id="validationCustom03" class="form-control" value = "<?=  $result['name'];?>"  required />
                  <div class="invalid-feedback">
                             Please provide a valid name
                    </div>
                  <span name="name" id="name_span">user name [4-18] characters which contains letters and numeric digits </span> 
                  <?= (isset($_SESSION['errors']['valid_name']))? $_SESSION['errors']['valid_name']:''?> 

                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" value = "<?=  $result['e_mail'];?>"  required/>
                  
                  <span name="email" id="email_span">Email is invalid</span> </td>
                  <?= (isset($_SESSION['errors']['valid_email']))? $_SESSION['errors']['valid_email']:''?> 

                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg"  value = "<?=  $result['pass_word'];?>"  required/>
                  
                  <span name="pass_span" id="pass_span">[6 to 16 ] characters which contain at least one special character, numeric digits,
                    letters</span>
                    <?= (isset($_SESSION['errors']['length_pass']))? $_SESSION['errors']['length_pass']:''?> 

                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <input type="password" name="Pass_confirm" id="form3Example4cdg" class="form-control form-control-lg"  value = "<?=  $result['pass_word'];?>"  required/>
                  
                  <span name="pass_conf_span" id="pass_conf_span">your Password is invalid</span>
                  
                </div>



                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example5cg">Room No</label>
                    <input type="number"  name="room" id="form3Example5cg" class="form-control form-control-lg" value = "<?=  $result['room'];?>"  required />
                   
                    <span name="room_span" id="room_span">Enter Valid Number </span> 
                    <?= (isset($_SESSION['errors']['valid_room']))? $_SESSION['errors']['valid_room']:''?> 

                  </div>



                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example6cg">EXt</label>
                    <input type="number" name="ext" id="form3Example6cg" class="form-control form-control-lg" value = "<?=  $result['EXT'];?>"  required/>
                   
                    <span name="ext_span" id="ext_span">Enter Valid Ext </span> 
                    <?= (isset($_SESSION['errors']['valid_ext']))? $_SESSION['errors']['valid_ext']:''?> 

                  </div>


                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example7cg">Image</label>
                    <input type="file" name="image" id="form3Example7cg" class="form-control form-control-lg" required  /> 
                    <p> <?="you uploaded this file :  images/". $result['image'] ?> </p>
                    
                   
                    <span name="img_span" id="img_span">Enter Valid image </span> 
                    <?= (isset($_SESSION['imgerrors']['image_extention']))? $_SESSION['imgerrors']['image_extention']:''?> 
                    <?= (isset($_SESSION['imgerrors']['image_size']))? $_SESSION['imgerrors']['image_size']:''?> 
                     
                   
                  </div>

                <!-- <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div> -->

                <div class="d-flex justify-content-evenly">
                  <button type="submit" name="Update"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">UPDATE</button>
                    <button type="reset"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reset</button>
                </div>
                <input type="hidden" value="<?= $_GET['id']; ?>"  name="idoriginal" >


                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="../index.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <<script src="../js/script.js"></script>
</head>

</body>
</html>