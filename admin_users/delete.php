<?php
require_once("../inc/database.php");
 
if(($_COOKIE['role']==1)&&(isset($_GET['id']))){
      echo"id={$_GET['id']}";
       try{
           

            $db = new DB();
       
               $userdelete = $db->deletedata("user","where id={$_GET['id']}");
            
               var_dump($userdelete);
               
             
             
              
               header("location:all_users.php");   
                   
             
       } catch(PDOException $e){
                 var_dump( $e->getMessage());
       }
  
      
}else{
      header("location:notfound.php");
}
 ?>