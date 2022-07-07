window.addEventListener("load", function() {

    let users = document.getElementById("users");
    let products = document.getElementsByClassName("product_img");


    for (var i = 0; i < products.length; i++) {
        products[i].onclick = (event) => {
            if (users.selectedIndex == 0) {
                alert('select user');
            } else {

                var user_id = users.options[users.selectedIndex].value;
                var product_id = event.target.getAttribute('value');
                var quantity = 1;
                //start ajax post 
                $.ajax({
                    url: "user_selectedProd.php",
                    method: "post",
                    data: {
                        user_id: user_id,
                        prod_id: product_id,
                        prod_quant: quantity

                    },
                    success: function(res) {

                       // console.log(res);
                    }

                });
                //  end ajax post 
                // start ajax get
                var total_orderPrice=0;
                $.ajax({
                    url: 'handle_getCart.php',
                    method: "GET",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.length > 0) {
                            var cartona = ``;

                            for (var i = 0; i < res.length; i++) {



                                cartona += `<div class="col-md-12">
                                 <h4 class="product_name">` + res[i].name + `</h4>
                <div class="counter ">
                    <div class="value-button decrease">-</div>
                    <input type="number" class="product_quant" name="product_quant" value="` + res[i].quantity + `"/>
                    <div class="value-button increase " value="Increase Value">+</div>
                    <input type="hidden" style="display:inline-block;" class="product_price"  value="` + res[i].price + `"/> 
                    </div>
                <h4 style="display:inline-block;" class="all_price">  </h4>
                </div>
                `
                 total_orderPrice +=res[i].price;

                            }
                            document.getElementById("product_data").innerHTML = cartona


                            //---------------------------------------------increase and decrease------------------------------------------------------------


                            var count = 1;
                         
                            $('.decrease').on('click', function() {
                                var quantity = $(this).next().val();
                                var price = $(this).nextAll('input[type=hidden]').val();

                                $(this).next().val(quantity);
                                $(this).nextAll('.all_price').text(price + 'EGP');

                                if (quantity > 1) {
                                    var v = (--quantity);
                                    $(this).next().val(v);
                                    var newpp = price * (v);
                                    $(this).nextAll('.all_price').text(newpp + 'EGP');

                                    count = v;
                                    total_orderPrice +=newpp;
                                } else {
                                    $(this).next().val(quantity);
                                    $(this).nextAll('.all_price').text(price + 'EGP');

                                    total_orderPrice +=price;

                                }
                                return count, total_orderPrice;

                            });

                            $('.increase').on('click', function() {
                                var quantity = $(this).prev().val();
                                var price = $(this).nextAll('input[type=hidden]').val();

                                if (quantity < 20) {
                                    var en = (++quantity);
                                    $(this).prev().val(en);
                                    var newadd = price * (en);
                                    $(this).nextAll('.all_price').text(newadd + 'EGP');

                                    count = en;
                                    total_orderPrice +=newadd;
                                    console.log(total_orderPrice);


                                } else {
                                    $(this).prev().val(quantity);
                                    $(this).nextAll('.all_price').text(price + 'EGP');
                                      
                                    total_orderPrice +=price;


                                }
                                return count, total_orderPrice;

                            });
                            $("#total_Price").val(total_orderPrice);

                            //end increase function
                            //update count
                            $.ajax({
                                url: "updateCount.php",
                                method: "POST",
                                data: {
                                    user_id: user_id,
                                    prod_id: product_id,
                                    prod_quant: count

                                },
                                success: function(res) {

                                   // console.log(res);
                                }

                            });
                            //  end ajax post 
                         var  rooms=document.getElementById("rooms");
                         var   exts=document.getElementById("exts");
                         var submit=document.getElementById("submit");
                         var note=$("#floatingTextarea").text();
                         submit.addEventListener('click',function(){
                            if (rooms.selectedIndex == 0) {
                                alert('select room');
                            } else if (exts.selectedIndex == 0){
                                    alert('select room');
                            }else if (users.selectedIndex == 0){
                                alert('select user');
                            }else{
                                $.ajax({
                                    url: "postOrder.php",
                                    method: "POST",
                                    data:{
                                        user_id: user_id,
                                        total: total_orderPrice,
                                        room: rooms.options[rooms.selectedIndex].value,
                                        ext: exts.options[exts.selectedIndex].value,
                                        note:note
    
                                    },
                                    success: function(res) {
    
                                        console.log(res);
                                    }
    
                                });

                            }
                         });
                          


                        }
                    }

                });
                // end ajax get 




            }





        }
    }




})