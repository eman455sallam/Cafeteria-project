
<?php
  if(isset($_POST['login'])){
          if( !empty( $_POST['email'])  && !empty($_POST['password']) ){
            function validation ($data){

              return htmlspecialchars(stripslashes(trim($data)));
    
            } 

            
            
            
            $ass_arr = [];
            $email = validation($_POST['email']);
            $pass = validation($_POST['password']);

            if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
              $ass_arr['valid_email']= "<p>Please Enter a valid email</p>"; 
            // }if(strlen($pass) < '7'){
            //   $ass_arr['length_pass']= "<p>Please password should be more than 7 characters</p>"; 
            // }
            if(count($ass_arr)>0 ){
              
              session_start();
              $_SESSION['errors']=$ass_arr;
            }else{
              // echo"hhhh";
              

              require 'inc/database.php';
              try{
                session_start();
                session_destroy();

             
                      $db = new DB();
                      // var_dump ($db);
                      // $query_statment= "INSERT INTO user (name,e_mail,pass_word,room,EXT,image) VALUES(?,?,?,?,?,?)";
                      $data = $db->get_data("*","user","e_mail='$email' and pass_word='$pass'");
                      $datawithoutpass=$db->get_data("*","user","e_mail='$email'");
                      // var_dump( $data);
                      $userinfo =$data->fetch(PDO::FETCH_ASSOC);
                      $datawithoutpass2 =$datawithoutpass->fetch(PDO::FETCH_ASSOC);

                      //check it is exist in data base 
                      //  var_dump( $userinfo);
                      //  var_dump($datawithoutpass2);
                      
                      if(($email==$datawithoutpass2['e_mail'])&&($pass!=$datawithoutpass2['pass_word'])){echo "<div class='notregistered'><h5><span> sorry :( Password incorrect <span></h5></div>";}
                        elseif(!$userinfo){echo "<div class='notregistered'><h5><span> sorry :( you are not registered in this site </span></h5></div>";}else{

                      // var_dump ($userinfo['name']);
                      setcookie("id",$userinfo['id']);
                       setcookie("name",$userinfo['name']);
                       setcookie("email",$userinfo['e_mail']);
                       setcookie("password",$userinfo['pass_word']);
                       setcookie("image", $userinfo['image']);
                       setcookie("room", $userinfo['room']);
                       setcookie("ext", $userinfo['EXT']);
                       setcookie("role", $userinfo['role']);

                      //  echo  "hello " . $_COOKIE['name'];
                    
                      if( $_COOKIE['role']== 2){
                         header('location:user/user.php');
                      }if( $_COOKIE['role']== 1){
                         header('location:admin.php');
                      }

                    }
                       
          
              
                        // header('location:**anypage**');
                  }catch(PDOException $e){
                        var_dump( $e->getMessage());
                  }

          }
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
    <link href="css/stylealiaa.css" rel="stylesheet" />
    
    <title>Document</title>
    <style>
        span{color: red}
        .notregistered{
            text-align:center;
            margin-top:20px;
        }
   
   

.greenColor{
    border:3px solid rgb(35, 212, 35);
}
    </style>
</head>
<body>
<section class="vh-100 bg-image" >
  <!-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> -->
  <div class="mask d-flex align-items-center h-100" >
    <div class="container h-100 mt-5" style="width: 100%;" >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h4 class="text-uppercase text-center mb-5">Log In </h4>

              <form action="" method="post" class="needs-validation">
                <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3cg">Your Email</label>
                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" required />
                    
                    <!-- <span name="email" id="email_span">Email is invalid</span> </td> -->
                    <span><?= (isset($_SESSION['errors']['valid_email']))? $_SESSION['errors']['valid_email']:''?></span>

                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4cg">Password</label>
                    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" required />
                    
                    <!-- <span name="pass_span" id="pass_span">[6 to 16 ] characters which contain at least one special character, numeric digits,
                        letters</span> -->

                    </div>
                    <div class="d-flex justify-content-evenly">
                  <button type="submit" name="login"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">LOG IN</button>
                    <button type="reset"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reset</button>
                </div>
                    <br>
                <div class="d-flex justify-content-evenly">
                  <a href="forg_password.php" > Forget Password </a>
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

<!-- <script src="script.js"></script> -->
</body>
</html>

    
        
