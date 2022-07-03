<?php
require_once("../inc/database.php");

//add product 
if(isset($_POST['AddProduct'])){
    $errors=[];
    //validation for product name
    if(!empty($_POST['productName'])){
        $product_name=validation($_POST['productName']);
        $product_name=ucfirst($product_name);
        if(strlen($product_name)<3){
            $errors["productName"]="product name must be more than 3 latters";
         }
        if (!preg_match("/^[a-zA-Z ]*$/",$product_name)) {  
            $errors["productName"] = " Only alphabets and white space are allowed";  
        }  
    }else{
         $errors["productName"]="this field is required";
         }

        //validation for price
    if(!empty($_POST['price'])){
        if (is_numeric($_POST['price'])) {
            $price = validation($_POST['price']);
        }else {
            $errors['price'] = 'Please enter only numbers in price field.';
            }
        }else{
            $errors["price"]="this field is required";
    
    }

       //validation select category
    if($_POST['category'] == "" ){
        $errors['category'] = "this field is required";
      }

        //store and validation image
        $strToArr = explode(".", $_FILES["image"]["name"]);
        $extension=end($strToArr);
        $allowedExt=["jpg","jpeg","gif","png"];
        $fileSize=$_FILES['image']['size'];
        $newimagename = round(microtime(true)). '.' .$extension;

            if(!in_array($extension,$allowedExt)&&$fileSize<=2097152){
                $errors['image'] ="your File is Not image";
            }
             
            if(count($errors)>0){
// 
                session_start();
                $_SESSION['errors']=$errors;
                header("location:./add_product.php");  
             }else{
                try{
                    session_start();
                    session_destroy();  
                    if(in_array($extension,$allowedExt)&&$fileSize<=2097152){
                    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/". $newimagename);
                    }
                    $db=new DB();
                    $connections= $db->get_connect();
                    $data=$db->insertdata("products", "name,price,image,category_id", "'{$product_name}','{$_POST['price']}','{$newimagename}','{$_POST['category']}'");
                    header("location:./all_products.php");
                    }catch(PDOException $e){
                    var_dump($e->getMessage());
                    }
            }
        }


     /*  -----------------------------------------------------------------------------------------------------------
     -----------------------------------------------------------------------------------------------------------
      handle-edit */ 

    if (isset($_POST['submitEdit']) && isset($_FILES['my_image']) ) {
   
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error_img = $_FILES['my_image']['error'];
        
    
        if($error_img === 0){
         
            $img_exten=pathinfo($img_name ,PATHINFO_EXTENSION);
            $img_ex_lowc = strtolower($img_exten);
    
            $allowed_exs = array("jpg", "jpeg", "png"); 
            if (in_array($img_ex_lowc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lowc;
                    $img_upload_path = '../uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
         
            }
    
    
        }
    
        $id= Validation($_POST["id"]);
        $name = Validation($_POST["name"]);
        $price = Validation($_POST["price"]);
    
    
       $db=new DB();

        if (!empty($name) && !empty($price)  ) {
            if(!is_numeric($name) && is_numeric($price)){
                 if(strlen($name)>5){
                    $db->updatedata("products","name='$name',price=$price,image='$new_img_name'","id={$id}");
                
                    header("location:all_products.php?success='updated successfuly'");
                 }else{
                    header("location:edit_product.php?id=$id&error='name must be >5 '");

                 } 
               
            }else{
                header("location:edit_product.php?id=$id&error='name must be string and price must be number '");
            }
    
        }else{
            header("location:edit_product.php?id=$id&error='feild is required'");
        }
    
    } else {
        header("location:index.php");
      
    }

      
    /*  -----------------------------------------------------------------------------------------------------------
     -----------------------------------------------------------------------------------------------------------
      handle-delete */
      $db=new DB();
      if(isset($_GET['id'])){
          $id= $_GET['id'];
          
        $run_query= $db->deletedata('products', "id=".$id);
      
          
         
         if ($run_query) {
          
          header("location:all_products.php?success=successfully deleted");
         } else {
          header("location:all_products.php?error=unknown error occurred");
       }
      
              }
    //function validation 
        function validation($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

?>
