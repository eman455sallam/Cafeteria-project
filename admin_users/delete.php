<?php
require_once("../inc/database.php");
 

 if(isset($_GET['id'])){
       try{

            $db = new DB();
       
               $userdelete = $db->deletedata("user","id={$_GET['id']}");
            //    $connection = new pdo("mysql:host=localhost;dbname=cafeteria" , "root" , "");
              // echo "delet from student where id={$_GET['id']}";
            //  $data = $connection->query("delete from user where id={$_GET['id']}");
      //     var_dump( $studentdelete);
              
             
             
              
               header("location:all_users.php");   
                   
             
       } catch(PDOException $e){
                 var_dump( $e->getMessage());
       }
  
 } 
 ?>