<?php
require_once("../inc/database.php");

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

?>
