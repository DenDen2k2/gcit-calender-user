
<?php
    session_start();
    $feedback = $_POST['feedback'];
    $username = $_SESSION['username']  
    //database connection
    include("include/includes.php");
    if($conn->connect_error){
        die('Connection Failed  : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into `user register`(UserName,Email,Password)values(?,?,?)");
        $stmt->bind_param("sss",$userName,$email,$password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        $_SESSION["username"] = $userName;
        header("Location: home.php", true, 301);   
    }
    
?>

