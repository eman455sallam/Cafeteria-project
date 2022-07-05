<?php
// echo $_COOKIE['name'];
if(isset($_COOKIE['name'])){
  setcookie("name","",time()-50000,"/");
  header("location:index.php");
  exit;
}
?>