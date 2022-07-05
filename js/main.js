// import{makeTDClikable,x} from "./second.js";
// two date inputs
let firstDate = document.getElementById("first_date");
let secondDate = document.getElementById("second_date");
let printData = document.getElementById("printData");
let productCard = document.getElementById("product_card");
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
                printData.innerHTML="";

                for (i = 0; i < con.length; i++) {
                    printData.innerHTML += `<tr>
                    <td>${con[i].date} </td>
                    <td id=${"status" + i}
                    >${con[i].status == "0"
                            ? "canceled"
                            : con[i].status == "1"
                                ? "processing"
                                : con[i].status == "2"
                                    ? "out for delivery"
                                    : con[i].status == "3"
                                        ? "Done"
                                        : ""
                        } </td>
                    <td>${con[i].total_amount} </td>
                    <td>${con[i].status == "1" ? '<a href="#">cancel</a>' : ""
                        } </td>
                    </tr>`;
                }
                // let x=0;
                // makeTDClikable(x);
                // to know the order date
                if (printData.rows.length != 0) {
                    // console.log(printData.rows.length);
                    for (x = 0; x < printData.rows.length; x++) {

                        printData.rows[x].cells[0].onclick = function () {

                            returnData = this.innerText;

                            let returnOrderDetails = [];
                            let orderDetails;

                            console.log(returnData + "inside loop");

                            // request to get this date is orders
                            orderDetailsRequest = new XMLHttpRequest();

                            orderDetailsRequest.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    orderDetails = this.responseText;

                                    returnOrderDetails = JSON.parse(orderDetails);
                                    console.log(returnOrderDetails);
                                    console.log(returnOrderDetails[0].length + "length");

                                    productCard.style.display = "inline-block !important";
                                    productCard.innerHTML = "";
                                    for (v = 0; v < returnOrderDetails[0].length; v++) {
                                        console.log("inside for loop");
                                        console.log("img" + returnOrderDetails[v + 1][0].image);
                                        console.log("name" + returnOrderDetails[v + 1][0].name);
                                        console.log("price" + returnOrderDetails[v + 1][0].price);
                                        console.log("v num  " + v);
                                        console.log("count" + returnOrderDetails[0][v].count);
                                        productCard.innerHTML += `<img class="card-img-top" src="../uploads/${returnOrderDetails[v + 1][0].image
                                            }" alt="Card image cap">
                                    <div class="card-body">
                                    <p class="card-text"> name :${returnOrderDetails[v + 1][0].name
                                            } </p>
                                    <p class="card-text"> count :${returnOrderDetails[0][v].count
                                            } </p>
                                    <p class="card-text"> price :${returnOrderDetails[v + 1][0].price
                                            } </p>
                                    </div>`;
                                    }
                                }
                            }; //request bracket ends
                            // console.log(typeof(returnData)+"return date");

                            orderDetailsRequest.open(
                                "GET",
                                "dbconnnection.php?orderDate=" + returnData,
                                true
                            );
                            orderDetailsRequest.send();

                            // -----------------------------
                            // cancel order
                            
                        };
                        // check if ther is a cancel link or no
                        if(printData.rows[x].cells[3].innerText == "cancel"){

                            console.log("inner text "+printData.rows[x].cells[3].innerText);
                            // console.log(printData.rows[x].cells[0].innerText);
                            printData.rows[x].cells[3].onclick = function () {
                                // let response;
                                // request to get this date is orders
                                    Canceled= new XMLHttpRequest();
    
                                    Canceled.onreadystatechange = function(){
    
                                   if(this.readyState === 4 && this.status === 200){
    
                                // console.log("response"+this.responseText);
                                
                                    response = this.responseText;
                                
                                
                            }// orderCanceledReques close
                            
                        }//request bracket ends
                        Canceled.open("GET","dbconnnection.php?status=0&date="+this.parentElement.cells[0].innerText,true);
                        Canceled.send();
                        // console.log( this.responseText);
                        
                            console.log( this.parentElement.cells[1])
                            this.parentElement.cells[1].innerText = "canceled";
                        
                            }; // on click  cancel order ended
                        }


                    } // print table rows

                } // for check rows not empty

            } // for ajax request to fetch all data from date to date

        }; // onreadystatechange function


        val = "firstDate=" + firstDate.value + "&secondDate=" + secondDate.value;
        xhr.open("GET", "../user/dbconnnection.php?" + val, true);
        xhr.send();
    } // for check that second date not empty
}); //first date event listener
