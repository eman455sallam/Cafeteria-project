//the form action="handle_addUser.php"
<?php 

    // var_dump($_POST);
    // echo "<pre>";
    // var_dump($_POST);
    // var_dump($_FILES);
    // echo "</pre>";
    if(isset($_POST['register'])){
        if(!empty($_POST['name']) && !empty( $_POST['email'])  && !empty($_POST['password']) && !empty($_FILES) && !empty($_POST['room']) && !empty($_POST['ext'])){
          function validation ($data){

            return htmlspecialchars(stripslashes(trim($data)));
   
           } 

          
          
          
          $ass_arr = [];
          $image_errors=[];
          $name = validation($_POST['name']);
          $email = validation($_POST['email']);
          $ext = validation($_POST['ext']);
          $room = validation($_POST['room']);
          $pass = validation($_POST['password']);
          

            
                        if(!preg_match('/^[a-z]*$/i',$name)){
                            $ass_arr['valid_name']= "<p>Please Enter a valid name</p>"; 
                        }if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                            $ass_arr['valid_email']= "<p>Please Enter a valid email</p>"; 
                        }
 
                    // email validation has been ended

                  // password validation starts
                
                    if(strlen($pass) < '7'){
                        $ass_arr['length_pass']= "<p>Please password shod be more than 7 characters</p>"; 
                    }
                    
                
                  // password validation has been ended

                  // room validation starts
                
                  
                   if (!preg_match('/^[1-9][0-9]*$/',$room)){
                      $ass_arr['valid_room']= "<p>Please  your room number should be just numbers</p>"; 
                  }
                  
             
                // password validation has been ended
                 // room validation  starts 

                
                  if (!preg_match('/^[1-9][0-9]*$/',$ext)){
                     $ass_arr['valid_ext']= "<p>Please  your ext number should be just numbers</p>"; 
                 }
                 
            
               // password validation has been ended

                 
                var_dump($_FILES); echo "<br>";
                var_dump($_POST);
               
                //image validation
                if($_FILES['image']['name']){
                   
                    if($_FILES['image']['size']>(10**6)){
                        $image_errors['image_size'] = "<p>Please imagge must be less thn 1mega byte</p>";
                    }
                    $extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    $images_extensions= ['png','jpg','jpeg'];
                    // echo $extension;
                    if(!in_array($extension,$images_extensions)){
                        $image_errors['image_extention'] = "<p>Please imagge extention must be 'png','jpg','jpeg' </p>";
                    } 

                    if(empty($image_errors)){
                        $photopath= 'images/';
                        $photoname= time().".".$extension;
                        $fullpath = $photopath.$photoname;
                         move_uploaded_file($_FILES['image']['tmp_name'],$fullpath);


                    }

                }

                if(count($ass_arr)>0 || count($image_errors)>0)
                { header("loction:register.php");
                  var_dump($ass_arr);
                  }else{
                    echo"hhhh";

                    require 'dbconnection.php';

                    
                    $db = new DB();
                    var_dump ($db);
                    // $query_statment= "INSERT INTO user (name,e_mail,pass_word,room,EXT,image) VALUES(?,?,?,?,?,?)";
                    $data = $db->insertdata("user","name,e_mail,pass_word,room,EXT,image","'$name','$email','$pass',$room,$ext,'$photoname'");
                    var_dump( $data);
        
                   
                    // $db = null;
                     header('location:login.php');
                }
                  // checklist validation has been ended
                
        }
           
        
    }


?>








































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
    <link href="style.css" rel="stylesheet" />
    
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
</head>
<body>


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
           <img src="team-3-800x800.jpg" height="80px" width="80px" style="margin-right:20px ;"> <span>Admin</span>
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
              <h4 class="text-uppercase text-center mb-5">Register </h4>

              <form action="handle_addUser.php" method="post"  enctype='multipart/form-data'  >

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                 
                  <span name="name" id="name_span">user name [4-18] characters which contains letters and numeric digits </span> 
                  
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                  
                  <span name="email" id="email_span">Email is invalid</span> </td>
                  
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                  
                  <span name="pass_span" id="pass_span">[6 to 16 ] characters which contain at least one special character, numeric digits,
                    letters</span>
                   
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <input type="password" name="Pass_confirm" id="form3Example4cdg" class="form-control form-control-lg" />
                  
                  <span name="pass_conf_span" id="pass_conf_span">your Password is invalid</span>
                  
                </div>



                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example5cg">Room No</label>
                    <input type="number"  name="room" id="form3Example5cg" class="form-control form-control-lg" />
                   
                    <span name="room_span" id="room_span">Enter Valid Number </span> 
                   
                  </div>



                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example6cg">EXt</label>
                    <input type="number" name="ext" id="form3Example6cg" class="form-control form-control-lg" />
                   
                    <span name="ext_span" id="ext_span">Enter Valid Ext </span> 
                    
                  </div>


                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example7cg">Image</label>
                    <input type="file" name="image" id="form3Example7cg" class="form-control form-control-lg" />
                   
                    <span name="img_span" id="img_span">Enter Valid image </span> 
                    
                   
                  </div>

                <!-- <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div> -->

                <div class="d-flex justify-content-evenly">
                  <button type="submit" name="register"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                    <button type="reset"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reset</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/script.js"></script>
</body>
</html>





