


// two date inputs
let firstDate = document.getElementById("first_date");
let secondDate = document.getElementById("second_date");
let printData = document.getElementById("printData");
let productCard = document.getElementById("product_card");
let returnData ;
let con = [];

productCard.style.display="none";

// get vlue from input 
firstDate.addEventListener("input",function(e){
    if(secondDate.value !== ""){
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                data=this.responseText;
                con = JSON.parse(data);
                console.log(con);

                // -----------------------
                // print data in table 
                for(i = 0 ; i< con.length; i++){
                    printData.innerHTML+=`<tr>
                    <td>${con[i].date} </td>
                    <td id=${"status"+i}
                    >${ (con[i].status == '0')? 'canceled':(con[i].status == '1')?'processing':(con[i].status == '2')? 'out for delivery':(con[i].status == '3')?'Done':""} </td>
                    <td>${con[i].total_amount} </td>
                    <td>${(con[i].status == '1')?'<a href="#">cancel</a>':""} </td>
                    </tr>`
                }

                // to know the order date
                if(printData.rows.length != 0){
                    // console.log(printData.rows.length);
                    for(x=0; x<printData.rows.length; x++){
                        printData.rows[x].cells[0].onclick = function (){


                            returnData= this.innerText;

                            let returnOrderDetails=[];
                            let orderDetails;

                            console.log(returnData+"inside loop")

                            // request to get this date is orders 
                            orderDetailsRequest= new XMLHttpRequest();

                            orderDetailsRequest.onreadystatechange = function(){

                           if(this.readyState === 4 && this.status === 200){

                                orderDetails=this.responseText;

                                returnOrderDetails = JSON.parse(orderDetails);
                                console.log(returnOrderDetails);
                                console.log(returnOrderDetails[0].length+"length");

                                productCard.style.display="inline_block";
                                for(v = 0 ; v>returnOrderDetails[0].length; v++){

                                    productCard.innerHTML=`<img class="card-img-top" src="../uploads${returnOrderDetails[v+1]['image']}" alt="Card image cap">`
                                }
                            }
                        }//request bracket ends
                        // console.log(typeof(returnData)+"return date");

                        orderDetailsRequest.open("GET","dbconnnection.php?orderDate="+returnData,true);
                        orderDetailsRequest.send();

                        }
                    }
                }
            }
        }
        val="firstDate="+firstDate.value+'&secondDate='+secondDate.value;
        xhr.open("GET","../user/dbconnnection.php?"+val,true);
        xhr.send();
        
        
        }





        
    })
    