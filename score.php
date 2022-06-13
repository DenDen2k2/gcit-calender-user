<?php
    session_start();
    ?>
    <!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="score.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <title>GCIT Sports Calander</title>
  </head>
  <body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">SportsCalender</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto my-2 my-lg-0 ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="uabout.php">About</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sports
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="sports.php">Football</a></li>
                  <li><a class="dropdown-item" href="#">Volleyball</a></li>
                  <li><a class="dropdown-item" href="#">Basketball</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Score
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="score.php">Football</a></li>
                  <li><a class="dropdown-item" href="#">Volleyball</a></li>
                  <li><a class="dropdown-item" href="#">Basketball</a></li>
                </ul>
              </li>    
              
              
                </li>
             </ul>  
                    
            </ul>
            <div class="btn-group dropstart">
              <button type="button" class="btn btn-secondary dropdown-toggle bg-dark" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> 
                <?php 
                echo $_SESSION["username"] ;
                ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-sliders-h fa-fw"></i>Account</a></li> -->
                <li><a class="dropdown-item" href="profile.html"><i class="fas fa-cog fa-fw"></i>Account Settings</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i>Log Out</a></li>
              </ul>
            </div>
           
            
               

          </div>
        </div>
      </nav>
    <br><br><br><br><br>
    <?php
                include("include/includes.php");
                if ($conn->connect_error){
                    die("Connection failed:  " . $conn->connect_error);
                }
                $sql = "select * from score";
                $result = $conn->Query($sql);
                if(!$result){
                    die("Invalid query: ". $conn->error);
                }
                $sql1 = "select * from score where month(Date)=5";
                if ($result = mysqli_query($conn, $sql1)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows( $result );
                }
                $type = "Football";
                if ($rowcount==0){
                    echo "<h1  style='background-color:Tomato; text-align: center; margin: 20px;'>There Were No Matches In this Month</h1>";
                }
                else{
                    while($row = $result->fetch_assoc()){
                        if ($type==$row["Type"]){
                            echo "<section>
                            <div class='container1'>
                                <div class='match'>
                                    <div class='match-header'>
                                        <div class='match-tournament'>
                                            <img src='logo.jpg' alt='GPL' height='50px' width='70px'>Gyalpozhing premier League
                                        </div>
                                        <div class='match-action'>
                                            <button class='btn-icon'><i class='material-icons'>grade</i></button>
                                            <button class='btn-icon'><i class='material-icons'>add_alert</i></button>
                                        </div>
                                    </div>
                                    <div class='match-content'>
                                        <div class='column'>
                                            <div class='team team--home'>
                                                <h1 class='team-name'>". $row["Team A"] ."</h1>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class='match-details'>
                                                <div class='match-date'>
                                                ". $row["Date"] ." at <strong>". $row["Time"] ."</strong>
                                                </div>
                                                <div class='match-score'>
                                                    <span class='match-score-number match-score-number--leading'>". $row["Team A Score"] ."</span>
                                                    <span class='match-score-divider'>:</span>
                                                    <span class='match-score-number'>". $row["Team B Score"] ."</span>
                                                </div>
                                                <div class='match-referee'>
                                                    Referee: <strong>". $row["Referee"] ."</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class='team team--home'>
                                                <h1 class='team-name'>". $row["Team B"] ."</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>";
                        }  
                    }
                }

            ?>
            
    <div class="parent">
        <div class="page-btn">
            <span>Jan</span>
            <span>Feb</span>
            <span>Mar</span>
            <span>Apr</span>
            <span>May</span>
            <span>&#10132</span>
        </div>
    </div>
    <section class="news py-3">
        <div class="container py-2">
          <div class="row pt-4">
            <div class="col-lg-12 m-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h5 class="pb-3">CONTACT</h5>
                  <a href="mailto: gcit@gmail.com">EMAIL: gcit@gmail.com</a><br>
                  <a href="tel:+97517778777">PHONE: +975 17778777</a>
                </div>
                <div class="col-lg-3">
                  <h5 class="pb-3">SITE BY</h5>
                  <p>PRJ GROUP13</p>
                </div>     
                <div class="col-lg-3">
                  <h5 class="pb-3">SOCIALS</h5>
                  <span><i class="fab fa-facebook"></i></span>
                  <span><i class="fab fa-instagram"></i></span>
                  <span><i class="fab fa-twitter"></i></span>
                  <span><i class="fab fa-google-plus"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
  </body>
</html>