<?php
require_once("../inc/database.php");
//add category
        if(isset($_POST['addCategory'])){
            $errors=[];
            if(!empty($_POST['categoryName'])){
                $category_name=validation($_POST['categoryName']);
                $category_name=ucwords($category_name);
                if(strlen($category_name)<5){
                    $errors["categoryName"]="category name must be more than 5 latters";
                 }
                if (!preg_match("/^[a-zA-Z ]*$/",$category_name)) {  
                    $errors["categoryName"] = " Only alphabets and white space are allowed";  
                }   
            }else{
                 $errors["categoryName"]="this field is required";
                 }
            if(count($errors)>0){
                session_start();
                $_SESSION['errors']=$errors;
                header("location:./add_category.php");
    
            }else{
                try{
                    session_start();
                    session_destroy();
                    $db=new DB();
                    $connections= $db->get_connect();
            
                    $data=$db->insertdata("categories","category","'{$category_name}'");
                    header("location:../admin_products/add_product.php");

                }catch(PDOException $e){
                var_dump($e->getMessage());
                }
            }
        }


        function validation($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
 
        //retrive categories

        $db=new DB();
        $connections= $db->get_connect();
         try{
              $data=$connections->query("select *  from categories");
              $categories= $data->fetchAll(PDO::FETCH_ASSOC);
              var_dump($categories);
         }catch(PDOException $e)
         {
             var_dump($e->getMessage());
         }
