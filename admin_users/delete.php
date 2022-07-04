<?php
require_once("../inc/database.php");
 

 if(isset($_GET['id'])){
       try{

            $db = new DB();
       
               $userdelete = $db->deletedata("user","id={$_GET['id']}");
            
              
             
             
              
               header("location:all_users.php");   
                   
             
       } catch(PDOException $e){
                 var_dump( $e->getMessage());
       }
  
 } 
 ?>