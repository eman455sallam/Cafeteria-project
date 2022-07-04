<?php
class DB {
  private $host = "localhost";
  private $dbname = "cafeteria";
  private $uname = "root" ; 
  private $password = "";
  private $connect= null;

   function __construct(){
    try{
    $this->connect=new pdo("mysql:host=$this->host;dbname=$this->dbname" , $this->uname , $this->password);
    }catch(PDOException $e){
      echo $e->getMessage();
      
    }
   }
   

   function get_connect (){
    return $this->connect;
   }

   function get_data($cols='*',$table,$condition=1){
    return $this->connect->query("select $cols from $table where $condition");
   }

   function insertdata($table,$cols, $values){
    return $this->connect->query("insert into $table ($cols) values ($values) ");

   }

   function deletedata($table,$condition){
    return $this->connect->query("delete from $table where $condition");

   }
   
   function updatedata($table,$values,$condition){
    return $this->connect->query("update $table set $values where $condition");

   }

}

?>