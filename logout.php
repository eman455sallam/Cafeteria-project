<?php
// echo $_COOKIE['name'];
if(isset($_COOKIE['name'])){
  setcookie("name","",time()-50000);
  setcookie("id","",time()-50000);
  setcookie("role","",time()-50000);
  setcookie("image","",time()-50000);
  setcookie("ext","",time()-50000);
  setcookie("room","",time()-50000);
  setcookie("email","",time()-50000);
  
   header("location:index.php");
  exit;
}
?>