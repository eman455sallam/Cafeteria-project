<?php
require_once("../inc/database.php");
$db = new DB();

 if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

     $img_name = $_FILES['my_image']['name'];
     $img_size = $_FILES['my_image']['size'];
     $tmp_name = $_FILES['my_image']['tmp_name'];
     $error_img = $_FILES['my_image']['error'];


     if ($error_img === 0) {

         $img_exten = pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lowc = strtolower($img_exten);

         $allowed_exs = array("jpg", "jpeg", "png");
         if (in_array($img_ex_lowc, $allowed_exs)) {
             $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lowc;
             $img_upload_path = '../uploads/' . $new_img_name;
             move_uploaded_file($tmp_name, $img_upload_path);
         }
     }
    
     var_dump($_POST);
     $id = Validation($_POST["id"]);
     $name = Validation($_POST["name"]);
     $price = Validation($_POST["price"]);
     $cat_id= Validation($_POST["category"]);


     if(!empty($name)){
         if( !empty($price)){
         if(!is_numeric($name)  ){
            if ( is_numeric($price)) {

             if (strlen($name) > 5) {
                 $db->updatedata("products", " `name`='$name',`price`='$price',`image`='$new_img_name ',`category_id`='$cat_id'", "id=$id");
                    echo 'yes';
                // header("location:all_products.php?success='updated successfuly'");
             } else {
                 header("location:edit_product.php?id=$id&name_error='name must be >5 '");
         
               }
            }else {
                header("location:edit_product.php?id=$id&price_error='price must be number '");
            }
         } else {
             header("location:edit_product.php?id=$id&name_error='name must be string' ");
         }
        }else {
            header("location:edit_product.php?id=$id&price_error='feild is required' ");
        }
     } else {
         header("location:edit_product.php?id=$id&name_error='feild is required'");
     }
 } else {
     header("location:../index.php");
 }


 function validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>