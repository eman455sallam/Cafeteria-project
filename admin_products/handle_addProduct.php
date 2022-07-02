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
                    move_uploaded_file($_FILES["image"]["tmp_name"], "../img/". $newimagename);
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
     
        function validation($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

?>
