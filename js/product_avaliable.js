window.addEventListener("load",function(){
    var clicked = true;
    var status = "avaliable";

    var buttons = document.getElementsByClassName("btn");
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].onclick = (event) => {


        if (!clicked) {
          event.target = buttons[i];
          clicked = true;
          status = "avaliable";

          var id = event.target.value;
          console.log(id);

          $.ajax({
            url: "product_avaliable.php",
            method: "post",
            data: {
              avaliable_status: status,
              prod_id: id
            },
            success: function(res) {

              console.log(res);
              event.target.innerHTML = "avaliable";
            }

          })
        } else {
          clicked = false;
          var id = event.target.value;
          // console.log(id);

          status = "not avaliable";
          $.ajax({
            url: "product_avaliable.php",
            method: "post",
            data: {
              avaliable_status: status,
              prod_id: id
            },
            success: function(res) {
              event.target.innerHTML = "not avaliable";

              console.log(res);
            }

          })

        }
      }

    }




   })