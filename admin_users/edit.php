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
    <title>EDIT AND UPDATE</title>
    <style>
    span{
    display: none;
    color: rgb(18, 221, 221);}
    p{color:red;}
   .greenColor{
    border:3px solid rgb(35, 212, 35);
    }
    </style>
   
    <body>
       <?php 
       
      
        require_once("../inc/database.php");



          //check edit button
          if(isset($_GET['id'])){
            session_start();

                  try{
                    
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
       
///////////////////////////////////////////////UPDATE////////////////////////////////////////////////////
if(isset($_POST['Update'])){
    
  // var_dump($_FILES); echo "<br>";
  //make sure all fields are filled
         
  if(!empty($_POST['name']) && !empty( $_POST['email'])  && !empty($_POST['password']) && !empty($_FILES ['image']) && !empty($_POST['room']) && !empty($_POST['ext'])){
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
    $pass_confirm = validation($_POST['Pass_confirm']);
    
              //email validation
      
                  if(!preg_match('/^[a-z]*$/i',$name)){
                      $ass_arr['valid_name']= "<p>Please Enter a valid name</p>"; 
                  }if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                      $ass_arr['valid_email']= "<p>Please Enter a valid email</p>"; 
                  }

              // email validation has been ended

            // password validation starts
          
              if(strlen($pass) < '7'){
                  $ass_arr['length_pass']= "<p>Please password shod be more than 7 characters</p>"; 
              }if($pass_confirm!=$pass){
                  $ass_arr['not_matched']= "<p>password does not match</p>"; }
              
          
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

           
          
         
          // image validation
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
                  $photopath= '../uploads/';
                  $photoname= time().".".$extension;
                  $fullpath = $photopath.$photoname;
                   move_uploaded_file($_FILES['image']['tmp_name'],$fullpath);


              }

          }
           //check for errors
          if(count($ass_arr)>0 || count($image_errors)>0){
           
           //make error session 
            $_SESSION['errors']=$ass_arr;
            $_SESSION['imgerrors']=$image_errors;
           
            
           
              
          
           
             
            
           
          }else{
             //start update
              try{
                    
                   //delete errror message    
                  session_destroy();
                     
                      
                      $data = $db->updatedata("user","name='$name', e_mail='$email', pass_word='$pass', room=$room, EXT=$ext , image='$photoname'","id={$_POST['idoriginal']}");
                           //redirect to all users page 
                         header("location:all_users.php");
                      //  var_dump($data);
                      //  var_dump($_POST);
      
 
                

                  }catch(PDOException $e){
                      var_dump( $e->getMessage());
                  } 
   
   
   
   
   
              
}
} 
}
?>

<!-- nav bar   -->
<?php include("../inc/nav_admin.php")?>
<?php if($_COOKIE['role']!=1){header("location:notfound.php");}?>

<!-- EDIT AND UPDATE FORM -->
    <section class="vh-100 bg-image" >
  <!-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> -->
  <div class="mask d-flex align-items-center h-100" >
    <div class="container h-100 mt-5" style="width: 100%;" >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h4 class="text-uppercase text-center mb-5">UPDATE </h4>

              <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype='multipart/form-data'    >

                <div class="form-outline mb-4">
                  <label class="form-label" for="validationCustom03">Your Name</label>
                  <input type="text" name="name" id="form3Example1cg" class="form-control" value = "<?=  $result['name'];?>"  required />
                  <span name="name" id="name_span">user name [4-18] characters which contains letters and numeric digits </span> 
                  <!-- PRINT ERROR MSG -->
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
                  <?= (isset($_SESSION['errors']['not_matched']))? $_SESSION['errors']['not_matched']:''?> 

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
                    <b> <?="you uploaded this file :  ". $result['image'] ?> </b>
                    
                   
                    <span name="img_span" id="img_span">Enter Valid image </span> 
                    <?= (isset($_SESSION['imgerrors']['image_extention']))? $_SESSION['imgerrors']['image_extention']:''?> 
                    <?= (isset($_SESSION['imgerrors']['image_size']))? $_SESSION['imgerrors']['image_size']:''?> 
                     
                   
                  </div>

               

                <div class="d-flex justify-content-evenly">
                  <button type="submit" name="Update"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">UPDATE</button>
                    <button type="reset"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reset</button>
                </div>
                <input type="hidden" value="<?= $_GET['id']; ?>"  name="idoriginal" >


                

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- <script src="../js/script.js"></script> -->
</head>

</body>
</html>