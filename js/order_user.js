function cart(id){ 
	  var product_id=id;
	  var product_name=document.getElementById("name_"+product_id).value;
	  var product_price=document.getElementById("price_"+product_id).value;
	  var user_id=document.getElementById("user_id").value;
      var quantity=1;

      console.log(user_id)
	    $.ajax({
            type:'post',
            url:'store_items.php',
            data:{
            product_id:id,
            user_id:user_id,
            item_name:product_name,
            item_price:product_price,
            quantity:quantity
            },
            success:function(response) {
                
                // console.log(response);
                document.getElementById("total_items").innerHTML=response;
                var product_id=document.getElementById("product_id").value;

                total_increase (product_id);
                
            }
        });
	
}
function total_increase (id) {
    var product_id=id;
	  var product_price=document.getElementById("price_"+product_id).value;
	  var user_id=document.getElementById("user_id").value;

    //   console.log(user_id)
	    $.ajax({
            type:'post',
            url:'totIncrease_price.php',
            data:{
            productID:id,
            userID:user_id,
            ProductPrice:product_price,
            },
            success:function(response) {
                
                // console.log(response);
                document.getElementById("total").innerHTML=response;

            }
        });
	
}
function decrease(id){ 
	  var product_id=id;
	  var product_name=document.getElementById("name_"+product_id).value;
	  var product_price=document.getElementById("price_"+product_id).value;
	  var user_id=document.getElementById("user_id").value;
      var quantity=1;

      console.log(user_id)
	    $.ajax({
            type:'post',
            url:'decrease.php',
            data:{
            product_id:id,
            user_id:user_id,
            item_name:product_name,
            item_price:product_price,
            quantity:quantity
            },
            success:function(response) {
                document.getElementById("total_items").innerHTML=response;
                var product_id=document.getElementById("product_id").value;

                total_increase (product_id)
            }
        });

}

function delete1(id) { 
    // alert('kkk')
    var cart_id=id;
    
      $.ajax({
          type:'get',
          url:'delete_item.php',
          data:{
          cart_id:cart_id,
          
          },
          success:function(response) {
              console.log(response);
    
          }
      });
  
}
    