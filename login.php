<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ab5a35dfc7.js" crossorigin="anonymous"></script>
</head>
<script>
  function registerfunction() {
     var emailID = document.form1.Email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");

     if(document.form1.fullname.value.length<1) {
         alert('Name is compulsary')
     }
     else if (!isNaN(document.form1.fullname.value)) {
         alert('Name cannot be numbers')
     }
     else if (atpos < 1 || ( dotpos - atpos < 2 )) {
         alert("Please enter correct email format")
         document.form1.Email.focus() ;
         return false;
     }
     else if(document.form1.Email.value.length<1) {
         alert('Email required')
     }
     else if (document.form1.Password.value.length<1) {
         alert('Password is required')
     }
     else{
         alert('Registration successful')
     }  
 }
  
 function loginfunction() {
     if(document.form1.eemail.value.length<1) {
         alert('Email required')
     }
     else if(document.form1.password.value.length<1) {
         alert('Password required')
     }
     else {
         window.location.href='index.php';
     }    
 }
</script>
<body>

        
    <div class="account">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form method="post" action="confirm.php" id="LoginForm">
                            <input type="text" placeholder="username" pattern="^[a-zA-Z ]*$" maxlength="20"
                            title="Numbers and special characters are not accepted" name="User">
                            <input type="password" placeholder="Password" minlength="8" name="Pass" >
                            <a href="home.php"><button type="submit" class="btn" href="index.html">Login</button></a>
                            <a href="">Forgot password</a>
                        </form>
                        <form method="post" action="connect.php" id="RegForm">
                            <input type="text" placeholder="Username" pattern="^[a-zA-Z ]*$" maxlength="20" 
                            title="Numbers and special characters are not accepted" name="UserName">
                            <input type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                            title="You must add you@domain.com" name="Email">
                            <input type="password" placeholder="Password" minlength="8" name="Password">
                            <a href="home.php"><button type="submit" class="btn">Register</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----footer---- -->
    
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="login.js"></script>
    
</body>
</html>