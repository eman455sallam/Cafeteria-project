
<?php
  if(isset($_POST['forgpass'])){
   
    if( !empty( $_POST['email'])  && !empty($_POST['password']) && !empty($_POST['Pass_confirm']) ){
            
            function validation ($data){

              return htmlspecialchars(stripslashes(trim($data)));
    
            } 

            
            
            
            $ass_arr = [];
            $email = validation($_POST['email']);
            $pass_confirm = validation($_POST['Pass_confirm']);
            $pass = validation($_POST['password']);
             

            if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                $ass_arr['valid_email']= "<p>Please Enter a valid email</p>"; 
              }
            if($pass_confirm!=$pass){
              $ass_arr['not_matched']= "<p>password does not match</p>"; 
            }if(strlen($pass) < '7'){
              $ass_arr['length_pass']= "<p>Please password shod be more than 7 characters</p>"; 
            }
            if(count($ass_arr)>0 ){
             
              session_start();
              $_SESSION['errors']=$ass_arr;

           
            }else{
              
              

              require 'inc/database.php';
              try{

             
                      $db = new DB();
                       
                       
                       $data = $db->updatedata("user","pass_word='$pass'","e_mail='$email'");
                    //   var_dump( $data);
                    
          
              
                         header('location:index.php');
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
       p{
        color:red;
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
              <h4 class="text-uppercase text-center mb-5"> password Update </h4>

              <form action="" method="post">

                 <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3cg">Your Email</label>
                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" required />
                    
                    <!-- <span name="email" id="email_span">Email is invalid</span> </td> -->
                    <?= (isset($_SESSION['errors']['valid_email']))? $_SESSION['errors']['valid_email']:''?> 

                    </div>
                    
                    <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">new Password</label>
                        <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" required/>
                        
                       
                            <?= (isset($_SESSION['errors']['length_pass']))? $_SESSION['errors']['length_pass']:''?> 

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cdg">confirm password</label>
                        <input type="password" name="Pass_confirm" id="form3Example4cdg" class="form-control form-control-lg" required />
                        <?= (isset($_SESSION['errors']['not_matched']))? $_SESSION['errors']['not_matched']:''?> 

                        
                        
                        </div>
                        <div class="d-flex justify-content-evenly">
                  <button type="submit" name="forgpass"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Update Password</button>
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

<!-- <script src="script.js"></script> -->
</body>
</html>
