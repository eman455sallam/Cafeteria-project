window.addEventListener("load", function() {

    /*name validation */

    let userName = this.document.getElementById("form3Example1cg");
    // userName.focus();

    let nameSpan = this.document.getElementById("name_span");

    userName.addEventListener('blur', function() {
        if (!isNameValid(userName.value)) {
            userName.focus();
            userName.select();
            nameSpan.style.display = "block";
        } else {
            nameSpan.style.display = "none";
            userName.classList.add("greenColor");
        }
    }); //end name blur

    /*Password validation */
    let userPass = this.document.getElementById("form3Example4cg");
    let passSpan = this.document.getElementById("pass_span");
    userPass.addEventListener('blur', function() {
        if (!isPassValid(userPass.value)) {
            userPass.focus();
            userPass.select();
            passSpan.style.display = "block";
        } else {
            passSpan.style.display = "none";
            userPass.classList.add("greenColor");
        }
    }); //end password blur

    /*Password confirm validation */
    let userPassConf = this.document.getElementById("form3Example4cdg");
    let passConfSpan = this.document.getElementById("pass_conf_span");
    userPassConf.addEventListener('blur', function() {
        if (userPass.value != userPassConf.value) {
            userPassConf.focus();
            userPassConf.select();
            passConfSpan.style.display = "block";
        } else {
            passConfSpan.style.display = "none";
            userPassConf.classList.add("greenColor");
        }
    }); //end password blur



    /*email validation */
    let userEmail = this.document.getElementById("form3Example3cg");
    let emailSpan = this.document.getElementById("email_span");

    userEmail.addEventListener('blur', function() {
        if (!isEmailValid(userEmail.value)) {
            userEmail.focus();
            userEmail.select();
            emailSpan.style.display = "block";

        } else {
            emailSpan.style.display = "none";
            userEmail.classList.add("greenColor");
        }
    }); //end email blur



    /*number validation */
    let room_num = this.document.getElementById("form3Example5cg");
    let roomspan = this.document.getElementById("room_span");


    room_num.addEventListener('blur', function() {
        if (!isNumValid(room_num.value)) {
            room_num.focus();
            room_num.select();
            roomspan.style.display = "block";

        } else {
            roomspan.style.display = "none";
            room_num.classList.add("greenColor");
        }
    }); //end number blur



    /*EXT validation */
    let ext_num = this.document.getElementById("form3Example6cg");
    let extspan = this.document.getElementById("ext_span");


    ext_num.addEventListener('blur', function() {
        if (!isNumValid(room_num.value)) {
            ext_num.focus();
            ext_num.select();
            extspan.style.display = "block";

        } else {
            extspan.style.display = "none";
            ext_num.classList.add("greenColor");
        }
    }); //end EXT blur

    //file image validation 

    let imagge = document.getElementById("form3Example7cg");
    let imgspan = document.getElementById("img_span");
    imagge.addEventListener('blur', function() {
        if (imagge.value.length < 4) {
            // alert('Must Select any of your photo for upload!');
            imgspan.style.display = "block";
            imagge.focus();
            return false;
        } else {
            imgspan.style.display = "none";
            imagge.classList.add("greenColor");
        }
    });
    //end of file img validation 





    /*start submit validation */
    this.document.forms[0].addEventListener('submit', function(event) {
        if (!isNameValid(userName.value) || !isPassValid(userPass.value) || !isEmailValid(userEmail.value)) {
            event.preventDefault();

        }
        /*local storage */
        let gender = document.querySelector('input[name="gender"]:checked').value;


        let user_records = [];
        user_records = JSON.parse(localStorage.getItem("users")) ? JSON.parse(localStorage.getItem("users")) : [];
        if (user_records.some((v) => { return v.email == userEmail.value })) {
            userEmail.focus();
            userEmail.select();
            emailSpan.style.display = "block";
            event.preventDefault();


        } else {
            user_records.push({
                'name': userName.value,
                'password': userPass.value,
                'email': userEmail.value,
                'gender': gender

            })
            localStorage.setItem("users", JSON.stringify(user_records));
        }

    }); /*end submit validation */





    /*start clear validation */
    this.document.forms[0].addEventListener('reset', function(data) {
        if (!confirm("Do you want to cancle ?")) {
            data.preventDefault();
        }

    }); /*end clear validation */




});



/* Regular expression functions and another validation functions*/
/*1-name regular expression */
function isNameValid(user_name) {
    let nameRegEx = /^[a-zA-Z]{4,18}$/;
    let trimInput = user_name.trim();
    return trimInput.match(nameRegEx); //return null or object
}
/*2-email validation */
function isEmailValid(email) {
    let emailRegEx = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email.match(emailRegEx); //return null or object

}
/*3- password validation */
function isPassValid(pass) {
    let trimPass = pass.trim();
    let passRegEx = /^(?=.*[0-9])(?=.*[!@#$%^&*_])[a-zA-Z0-9!@#$%^&*_]{6,16}$/;
    return trimPass.match(passRegEx); //return null or object
}
/*4- room validation */
function isNumValid(room_num) {
    let numRegEx = /^([0-9])/;
    let trimInput = room_num.trim();
    return trimInput.match(numRegEx); //return null or object
}