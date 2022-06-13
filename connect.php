
<?php
    session_start();
    $userName = $_POST['UserName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    //database connection
    include("include/includes.php");
    if($conn->connect_error){
        die('Connection Failed  : '.$conn->connect_error);
    }else{
        $sql="Select * from `user register` where UserName='$userName'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                echo "Username already exist";
                header("Location: login.php", true, 301);
                exit();
            }
            else{
                $sql="Select * from `user register` where Email='$email'";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $num=mysqli_num_rows($result);
                    if($num>0){
                        echo "email already exist";
                        header("Location: login.php", true, 301);
                        exit();
                    }
                    else{
                        $stmt = $conn->prepare("insert into `user register`(UserName,Email,Password)values(?,?,?)");
                        $stmt->bind_param("sss",$userName,$email,$password);
                        $stmt->execute();
                        $stmt->close();
                        $conn->close();
                        $_SESSION["username"] = $userName;
                        $_SESSION["email"] = $email;
                        header("Location: home.php", true, 301);
                    }
                }   
            }
        }
    }
?>

