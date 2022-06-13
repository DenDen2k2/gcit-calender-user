<?php
    session_start();
    $userName = $_POST['User'];
    $password = $_POST['Pass'];

    //database connection
    include("include/includes.php");
    if($conn->connect_error){
        die('Connection Failed  : '.$conn->connect_error);
    }else{
        $sql="Select * from `user register` where UserName='$userName' and Password='$password'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num==0 || $num>1){
                header("Location: login.php?error=password_errada1");
            }
            else{
                echo "Log In successfull";
                $conn->close();
                $_SESSION["username"] = $userName;
                header("Location: home.php", true, 301);
                exit(); 
            }
            if($num==0 || $num>1){
                header("Location: login.php", true, 301);
                exit();
            }
        }
    }
?>
