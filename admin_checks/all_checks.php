<?php
require("../inc/database.php");
$dbconn = new DB();
// SELECT orders.id , sum(total_amount) ,user.name FROM orders , user WHERE user.id=orders.user_id GROUP BY orders.user_id
$all_rows = $dbconn->get_data("orders.id , sum(total_amount) as total_amount ,orders.user_id as user_id,user.name","user,orders","user.id=orders.user_id GROUP BY orders.user_id");
$items = $all_rows->fetchAll(PDO::FETCH_ASSOC);
$json_data = json_encode($items);

var_dump($items);
echo"<br> <br>";
var_dump($json_data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Document</title>
</head>
<body>
    
<table cellpadding=5 border=2 width=800 align=center>
  <tr height=125 >
    <td colspan=2>
       <table>
	    <tr>
		    <td>
            
        </td>
		   </tr>
       </table> 	   
	  </td>
  </tr>   
  <tr height=600  valign=top>
	<!-------------------------------------------------->	
    <td>	
	<h2 align=center>Data of Orders</h2>
   <table style="width:100%" cellpadding=5 border=2>
   
      <table class="table table-striped" id="user">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Total Amount</th>
      <th scope="col" style="display:none;"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    $user_id=array();
    foreach( $items as $item)
    { 
      $recordId=$item['id'];
      $user_id[$i]=$item['user_id'];
    ?>
    <tr>
      <th scope="row"><a href=#><i class="fa-solid fa-plus" id="<?php echo  $user_id[i] ;?>"></i></a></th>
      <td><?php echo$item['name'] ;?></td>
      <td><?php echo$item['total_amount'] ;?></td>
      <td > <input type="hidden" value="<?php echo$item['user_id'] ;?>" class="hiddenInput"> </td>
    </tr>    
    <?php 
          $i++;
    }  
    // $all_rows2 = $dbconn->get_data("*","orders , user","orders.user_id=user.id");
    // $items2 = $all_rows2->fetchAll(PDO::FETCH_ASSOC);
    // $json_data2 = json_encode($items2);
    // // var_dump($json_data2);
    ?>

  </tbody>
  <table style="" class="table table-striped" id="data1">
            <th>
              <th>Order Done</th>
              <th>Amount</th>
              <th><?php echo  $user_id[0] ;?></th>
            </th>

            
          </table>
          
	</td> 
  </tr>    
</table>
</table>
</table>

<script>
    var requiredId=  document.getElementByClass("hiddenInput").value;
    console.log(requiredId);
      document.getElementById("user").addEventListener("click", (event) => {
        if (event.target.classList.value == "fa-solid fa-plus") {
          console.log(event.target.name);
          document.getElementById(`data${event.target.id}`).style.display =
            "block";
          event.target.classList.remove("fa-solid", "fa-plus");
          event.target.classList.add("fa-solid", "fa-minus");
        } else if (event.target.classList.value == "fa-solid fa-minus") {
          console.log(event.target.classList.value);
          document.getElementById(`data${event.target.id}`).style.display =
            "none";
          event.target.classList.remove("fa-solid", "fa-minus");

          event.target.classList.add("fa-solid", "fa-plus");
        }
      });
    </script>

</body>
</html>