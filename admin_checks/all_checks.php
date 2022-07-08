<?php
// include "../js/all_checks.js";
require("../inc/nav_admin.php");
require("../inc/database.php");
$dbconn = new DB();
// SELECT orders.id , sum(total_amount) ,user.name FROM orders , user WHERE user.id=orders.user_id GROUP BY orders.user_id
$all_rows = $dbconn->get_data("orders.id , sum(total_amount) as total_amount ,orders.user_id as user_id,user.name","user,orders","user.id=orders.user_id GROUP BY orders.user_id");
$items = $all_rows->fetchAll(PDO::FETCH_ASSOC);
$json_data = json_encode($items);

// var_dump($items);
echo"<br> <br>";
// var_dump($json_data);

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
            <input id="firstDate" type="datetime-local" name="firstDate" />
        </td>
        <td>
            <input id="secondDate" type="datetime-local" name="secondDate" />
        </td>
		   </tr>
       </table> 	   
	  </td>
  </tr>   
  <tr height=600  valign=top>
	<!-------------------------------------------------->	
    <td>	
	<h2 align=center>Data of Orders</h2>
   <table style="width:100%" cellpadding=5 border=2 align=center>
   
      <table class="table table-striped" id="user">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Total Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    $user_id=array();
    foreach( $items as $item)
    { 
      $user_id[$i]=$item['user_id'];
      //query2 with fecth 2
      $all_orders = $dbconn->get_data("date , total_amount , id","orders","user_id=$user_id[$i]");
      $order_items = $all_orders->fetchAll(PDO::FETCH_ASSOC);
      $json_data2 = json_encode($order_items);
    //   var_dump($json_data2);
    ?>
    <tr>
      <th scope="row"><a href=#><i class="fa-solid fa-plus" id="<?php echo $user_id[$i] ;?>"></i></a></th>
      <td><?php echo$item['name'] ;?></td>
      <td><?php echo$item['total_amount'] ;?></td>
    </tr>    
    <!-- /////////////////////////////////new table/////////////////////////////////////////////////////////////// -->
    <tr  style=" display: none" id="data<?php echo $user_id[$i] ;?>" colspan="3">
        <td style="background-color: #F0F8FF; "  colspan="3">
        <table style="" class="table table-striped" align=center id="user2" >
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order Done</th>
              <th scope="col">Amount</th>
            </tr>  
            <?php
            $j=0;
            $order_id=array();
            foreach( $order_items as $order_item)
            { 
                $order_id[$j]=$order_item['id'];
                //query 3 with fwtch 3
                $all_user_orders = $dbconn->get_data("users_orders.count as count, products.image as img",
                                                     "orders,users_orders, products",
                                                     "orders.id=users_orders.order_id
                                                     AND users_orders.product_id=products.id");
                $user_order_images = $all_user_orders->fetchAll(PDO::FETCH_ASSOC);
                $json_data3 = json_encode($user_order_images);
                // var_dump($user_order_images);
                ?>
                <tr>
                <th scope="row"><a href=#><i class="fa-solid fa-plus" id="<?php echo $order_id[$j] ;?>"></i></a></th>
                <td><?php echo $order_item['date'] ;?></td>
                <td><?php echo $order_item['total_amount'] ;?></td>
              </tr>
              <tr  style="background-color: yellow; display: none" id="data2<?php echo $order_id[$j] ;?>">
              <td style="background-color: #AFEEEE; " colspan="3">
              <table style="" class="table table-striped" align=center>
               
              <?php
              foreach( $user_order_images as $user_order_image)
              { 
                ?>
                <tr> <td><img src='<?php echo $user_order_image['img']  ?> ' ></td></tr>
                <tr> <td><?php echo $user_order_image['count'] ?> </td></tr>
                <?php
              }
              ?>
              </td>
         </tr>
              </table>
           <!-- </td>
         </tr> -->
          <?php
            $j++;
            }    
            ?>
            
          </table>
        </td>
    </tr>
    <?php 
          $i++;
    }  
    ?>
	</td> 
  </tr>    
</table>
</table>
</table>

<script>
      document.getElementById("user").addEventListener("click", (event) => {
        if (event.target.classList.value == "fa-solid fa-plus") {
          document.getElementById(`data${event.target.id}`).style.display =
            "block";
          event.target.classList.remove("fa-solid", "fa-plus");
          event.target.classList.add("fa-solid", "fa-minus");
        } else if (event.target.classList.value == "fa-solid fa-minus") {
          document.getElementById(`data${event.target.id}`).style.display =
            "none";
          event.target.classList.remove("fa-solid", "fa-minus");

          event.target.classList.add("fa-solid", "fa-plus");
        }
      });

      document.getElementById("user2").addEventListener("click", (event) => {
        if (event.target.classList.value == "fa-solid fa-plus") {
          document.getElementById(`data2${event.target.id}`).style.display =
            "block";
          event.target.classList.remove("fa-solid", "fa-plus");
          event.target.classList.add("fa-solid", "fa-minus");
        } else if (event.target.classList.value == "fa-solid fa-minus") {
          document.getElementById(`data2${event.target.id}`).style.display =
            "none";
          event.target.classList.remove("fa-solid", "fa-minus");

          event.target.classList.add("fa-solid", "fa-plus");
        }
      });

      // two date inputs
let firstDate = document.getElementById("first_date");
let secondDate = document.getElementById("second_date");

let returnData;
let con = [];
let response='0';

// productCard.style.display="none";

// get vlue from input
firstDate.addEventListener("input", function (e) {
    if (secondDate.value !== "") {
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                data = this.responseText;
                con = JSON.parse(data);
                console.log(con);

                // -----------------------
                // print data in table
               
            }
        }       

        val = "firstDate=" + firstDate.value + "&secondDate=" + secondDate.value;
        xhr.open("GET", "../user/dbconnnection.php?" + val, true);
        xhr.send();
    } // for check that second date not empty
}); //first date event listener


    </script>

</body>
</html>