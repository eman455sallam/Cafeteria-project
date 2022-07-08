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
