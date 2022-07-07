<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="CSS/bootstrap.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/stylealiaa.css" rel="stylesheet" />
    
    <title>all users</title>
    <style>
       img{
        width:50px;
        height:50px;
       } 
       .title{
        margin-top:30px;
        text-align:center;
        
       }
       .adduser{
        display:inline-block;
        position:absolute;
        right:60px;
       }
    </style>
</head>
<body>

<?php    
         
         if((isset($_COOKIE['name']))&&($_COOKIE['role']==1)){
           

        }else{
            
            header("location:notfound.php");
            
        }
        
     ?>
    <!-- nav bar   -->
<?php include("../inc/nav_admin.php")?>
    
       



        <div class="title"><h2>ALL Users</h2></div>
        <a class="adduser" href="add_user.php">Add User</a>




      <div class="container h-100 mt-5" style="width: 100%;" >
            <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Room</th>
            <th scope="col">Image</th>
            <th scope="col">Ext</th>
            <th scope="col">Action</th>
            
            </tr>
        </thead>
        <tbody>
        <?php
             require_once("../inc/database.php");
      
        
             try{
            $db = new DB();
       
            $userinsert = $db->get_data("id,name,room,image,EXT","user", 1);
            $result=$userinsert->fetchAll(PDO::FETCH_ASSOC);
           
            foreach($result as $value){
                echo "<tr>";
               
                foreach($value as $key => $dataa){
                    
                    
                    if($key=="image"){echo "<td><img src='../uploads/$dataa'</td>";}else{
                        echo "<td>" . $dataa . "</td>" ;
                    }
                }
                
                echo "<td>  <a href='edit.php?id={$value['id']}'> edit </a>"."   ||  ". " <a href='delete.php?id={$value['id']}'> delete </a></td>";
                
               
                echo "</tr>";
            }
        
        } catch(PDOException $e){
            var_dump( $e->getMessage());
        }
        ?>
            
            
            
        </tbody>
        </table>
    <div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>