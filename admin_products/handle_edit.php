<?php 

require_once("../inc/database.php");
$db=new DB();
 if (isset($_POST['submit']) && isset($_FILES['my_image']) ) {
   
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


    $id= validate($_POST["id"]);
    $name = validate($_POST["name"]);
    $price = validate($_POST["price"]);
   echo $_POST["name"]."emaan";


    if (!empty($name) && !empty($price)  ) {
        if(!is_numeric($name) && is_numeric($price)){
             $db->updatedata("products","name='$name',price=$price,image='$new_img_name'","id={$id}");
            
            echo "yes";
           
        }

    }
}      
//     }else{
//         $error="location:update.php?error='feild is required'";
//     }

// } else {
//     header("location:index.php");
  
// }

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>