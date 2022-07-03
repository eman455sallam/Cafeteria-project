<?php






?>
<script  type="text/javascript">
    // two date inputs
let firstDate = document.getElementById("first_date");
let secondDate = document.getElementById("second_date");
let tdForDate = document.getElementById("tdForDate");
// get vlue from input 
firstDate.addEventListener("input",function(e){
    // console.log(e);
    console.log(this.value);
    console.log(secondDate.value);
    if(secondDate.value !== ""){
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                // data = json.parse(this.responseText);
                data=this.responseText;
                console.log(this.responseText);
                // console.log(data+"55555");
                console.log(typeof(this.responseText));
                // tdForDate.innerText= data[0]["date"];
                // tdForDate.innerText= this.responseText;
            }
        }
        val="firstDate="+firstDate.value+'&secondDate='+secondDate.value;
        // console.log(val);
        // xhr.open("GET",`dbconnnection.php?first_date=${this.value}second_date=${secondDate.value}`)
        xhr.open("GET","dbconnnection.php?"+val,true);
        xhr.send();
    }

})
</script>
<?php
// require "dbconnnection.php";
// var_dump($result);

?>