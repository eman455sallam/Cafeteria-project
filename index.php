//login page 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Cafeteria</h2>
    <form method="get" action="" name="myform" onsubmit='return(validate());'>
      <div class="container">
        <label for="uname"><b>Email:-</b></label>
            <input type="text" placeholder="Enter your Email" name="name" id="name"><br>
            <span id="spanname" style="color:red"></span><br>
            <label for="psw"><b>Password:-</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password"><br>
            <span id="spanpsw" style="color:red"></span><br>
        <button type="submit" value="submit">Login</button>
      </div>
      <p>forget password? <a href="#">click Here</a></p>
    </form>
    <script>
      function validate() {  
        if (document.myform.name.value == "") {
                document.getElementById("spanemail").innerHTML = "Fill the Email please!";
                document.myform.name.focus();
                return false;
            }
            if (document.myform.password.value == "") {
                document.getElementById("spanpsw").innerHTML = "Fill the password please!";
                document.myform.password.focus();
                return false;
            }
          }
    </script>
</body>
</html>