// 
//  function makeTDClikable(){
//     if (printData.rows.length != 0) {
//         // console.log(printData.rows.length);
//         for (x = 0; x < printData.rows.length; x++) {
    
//             printData.rows[x].cells[0].onclick = function (e) {
//                 e.target.classList.add("clickale");
    
//                 returnData = this.innerText;
    
//                 let returnOrderDetails = [];
//                 let orderDetails;
    
//                 // console.log(returnData + "inside loop");
    
//                 // request to get this date is orders
//                 orderDetailsRequest = new XMLHttpRequest();
    
//                 orderDetailsRequest.onreadystatechange = function () {
//                     if (this.readyState === 4 && this.status === 200) {
//                         orderDetails = this.responseText;
    
//                         returnOrderDetails = JSON.parse(orderDetails);
//                         console.log(returnOrderDetails[0].length + "length");
                        
//                         productCard.innerHTML = "";
//                         for (v = 0; v < returnOrderDetails[0].length; v++) {
//                             console.log("return data"+returnOrderDetails);
//                             console.log("inside for loop");
//                             console.log("img" + returnOrderDetails[v + 1][0].image);
//                             console.log("name" + returnOrderDetails[v + 1][0].name);
//                             console.log("price" + returnOrderDetails[v + 1][0].price);
//                             console.log("v num  " + v);
//                             console.log("count" + returnOrderDetails[0][v].count);

//                             // ---------------------------
//                             productCard.innerHTML += `<div class="card"  >
//                             <img class="card-img-top" src="../uploads/${returnOrderDetails[v + 1][0].image
//                                 }" alt="Card image cap">
//                                 <div class="card-body">
//                                 <p class="card-text"> name :${returnOrderDetails[v + 1][0].name
//                                         } </p>
//                                 <p class="card-text"> count :${returnOrderDetails[0][v].count
//                                         } </p>
//                                 <p class="card-text"> price :${returnOrderDetails[v + 1][0].price
//                                         } </p>
//                                 </div>
//                         </div>`
                        
//                         }
//                     }
//                 }; //request bracket ends
//                 console.log(returnData+"return date");
    
//                 orderDetailsRequest.open("GET","dbconnnection.php?orderDate="+returnData,true);
//                 orderDetailsRequest.send();
    
//                 // -----------------------------
//                 // cancel order
                
//             };
//             // check if ther is a cancel link or no
//             if(printData.rows[x].cells[3].innerText == "cancel"){
    
//                 console.log("inner text "+printData.rows[x].cells[3].innerText);
//                 // console.log(printData.rows[x].cells[0].innerText);
//                 printData.rows[x].cells[3].onclick = function () {


//                     // request to get this date is orders
//                         Canceled= new XMLHttpRequest();
    
//                         Canceled.onreadystatechange = function(){
    
//                        if(this.readyState === 4 && this.status === 200){
    
//                     // console.log("response"+this.responseText);
                    
//                         response = this.responseText;
                    
                    
//                 }// orderCanceledReques close
                
//             }//request bracket ends
//             Canceled.open("GET","dbconnnection.php?status=0&date="+this.parentElement.cells[0].innerText,true);
//             Canceled.send();
//             // console.log( this.responseText);
            
//                 console.log( this.parentElement.cells[1])
//                 this.parentElement.cells[1].innerText = "canceled";
            
//                 }; // on click  cancel order ended
//             }
    
    
//         } // print table rows
    
//     } // for check rows not empty
// }
// let amount = 0;
makeTDClikable();