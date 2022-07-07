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
            
             }


            if(count($ass_arr)>0 ){

              
              session_start();
              $_SESSION['errors']=$ass_arr;
              header('location:index.php');
            }else{
              
              

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
                      
                      if(($email==$datawithoutpass2['e_mail'])&&($pass!=$datawithoutpass2['pass_word']))
                      {
                        setcookie("passincorrect","<div class='notregistered'><h5><span> sorry :( Password incorrect <span></h5></div>"); 
                        header("location:index.php");

                      }
                        elseif(!$userinfo){setcookie("notregistered", "<div class='notregistered'><h5><span> sorry :( you are not registered in this site </span></h5></div>");
                          header("location:index.php");

                        }else{
                          setcookie("passincorrect","",time()-50000);
                          setcookie("notregistered","",time()-50000);


                      // var_dump ($userinfo['name']);
                      setcookie("id",$userinfo['id']);
                       setcookie("name",$userinfo['name']);
                       setcookie("email",$userinfo['e_mail']);
                       setcookie("image", $userinfo['image']);
                       setcookie("room", $userinfo['room']);
                       setcookie("ext", $userinfo['EXT']);
                       setcookie("role", $userinfo['role']);

                      

                    
                      if( $userinfo['role']== 2){
                         header('location:user/user.php');
                      }if( $userinfo['role']== 1){
                         header('location:admin.php');
                      }

                    }
                       
          
              
                        
                  }catch(PDOException $e){
                        var_dump( $e->getMessage());
                  }
                }
          }
        }
           



?>