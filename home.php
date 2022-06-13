<?php
    session_start();
  include("include/includes.php");
  if ($conn->connect_error){
      die("Connection failed:  " . $conn->connect_error);
  }
  $visitor_ip = $_SERVER['REMOTE_ADDR'];
  $sql = "select * from visitor";
  $result = $conn->Query($sql);
  if(!$result){
      die("Invalid query: ". $conn->error);
  }
  $stmt = $conn->prepare("insert into visitor(`ip address`)values(?)");
  $stmt->bind_param("s",$visitor_ip);
  $stmt->execute();
  $stmt->close();
  $conn->close();
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
    <link rel="stylesheet" href="index.js">
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <title>GCIT Sports Calender</title>
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
                echo $_SESSION["username"] ."". $_SESSION["email"];
                
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
      <!-- <marquee behaviour="scroll" scrollamount="15"><font style="font-size:30px;  text-align: center;" >The GCIT's sporting events at your fingertips!</font></marquee> -->
      <br><br><br>
      <div>
        <h1 class="text-dark pt-2"><marquee behaviour="scroll" scrollamount="20" <font style="font-size: 28px; text-align: center; padding: 10px;">The GCIT's sporting events at your fingertips! GCIT Sports Event Calander</font></marquee></h1>
      </div>

      
      <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="hm.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>All About Sports</h5>
                  <p>Life is Sport, Make it count</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="m.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Sports Event Calendar</h5>
                  <p>Be More Productive. Save time. Focus!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="fb.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Power Up</h5>
                  <p>Today is the DAY!</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>
      <section class="about">
        <div class="container py-5">
          <div class="row py-5">
            <div class="col-lg-8 m-auto text-center">
              <h1>Welcome To Our GCIT Sports Calendar</h1>
              <h6 style="color: red;">Fearless Play</h6>
            </div>
            <?php
              include("include/includes.php");
              if ($conn->connect_error){
                  die("Connection failed:  " . $conn->connect_error);
              }
              $highlight = "SELECT *
              FROM score
              WHERE `Match Id` = ( SELECT MAX(`Match Id`) FROM score )";
              $result = $conn->Query($highlight);
              $upevent = "SELECT * FROM sports WHERE Date > CURDATE() ";
              $result1 = $conn->Query($upevent);
              $champ = "SELECT * FROM champions WHERE `Id` = ( SELECT max(`Id`) FROM champions )";
              $result2 = $conn->Query($champ);
              if(!$result){
                  die("Invalid query: ". $conn->error);
              }
              if(!$result1){
                die("Invalid query: ". $conn->error);
              }
              if(!$result2){
                die("Invalid query: ". $conn->error);
              }
              $rowhl = $result->fetch_assoc();      
              $upevent = $result1->fetch_assoc(); 
              $champ = $result2->fetch_assoc();                                          
              echo "                           
    <div id='cards_landscape_wrap-2'>
      <div class='container'>
          <div class='row g-3'>
              <div class='col-12 col-md-6 col-lg-4'>
                  <a href=''>
                      <div class='card-flyer h-100'>
                          <div class='text-box'>
                              <div class='image-box'>
                                  <img class='card-img-top' src='upcoming.jpg' alt='' />
                              </div>
                              <div class='text-container'>
                                <h5>Upcoming Event
                                  </h5>
                                  <h6>" . $upevent["Type"] . " Date: " . $upevent["Date"] . " <br>
                                  Time: " . $upevent["Time"] . " <br>
                                  " . $upevent["Team A"] . " VS " . $upevent["Team B"] . "</h6>            
                                   <br>   
                              </div>
                              <a href='#' class='btn btn-danger'>Read More</a>
                          </div>
                      </div>
                  </a>
              </div>
              <div class='col-12 col-md-6 col-lg-4'>
                  <a href=''>
                      <div class='card-flyer h-100'>
                          <div class='text-box'>
                              <div class='image-box'>
                                  <img class='card-img-top' src='pp.jpg' alt='' />
                              </div>
                              <div class='text-container'>
                                <h5>Highlights</h5>                                    
                                  <h6>Date: " . $rowhl["Date"] ." <br> ". $rowhl["Team A"] . " VS " . $rowhl["Team B"] . "
                                  <br>
                                  Score: " . $rowhl["Team A Score"] . "-" . $rowhl["Team B Score"] . "
                                  <br>
                                  </h6>
                                  <br> 
                              </div>
                              <a href='#' class='btn btn-danger'>Read more</a>
                          </div> 
                      </div>
                  </a>
              </div>
              <div class='col-12 col-md-6 col-lg-4'>
                  <a href=''>
                      <div class='card-flyer h-100'>
                          <div class='text-box'>
                              <div class='image-box'>
                                  <img class='card-img-top' src='champ.jpg' alt='' />
                              </div>

                              <div class='text-container'>
                                  <h6>Champions</h6>
                                  <h5>"
                                  . $champ["Team Name"] . " was declared the champion on "
                                  . $champ["Date"] . " ("
                                  . $champ["Type"] . ") <br>
                                  </h5>
                                  <br>
                              </div>
                              <a href='#' class='btn btn-danger'>Read more</a>

                          </div>
                      </div>
                  </a>
              </div>"
              ?>
              <!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                  <a href="">
                      <div class="card-flyer">
                          <div class="text-box">
                              <div class="image-box">
                                  <img src="https://cdn.pixabay.com/photo/2018/03/30/15/12/dog-3275593_960_720.jpg" alt="" />
                              </div>
                              <div class="text-container">
                                  <h6>Title 04</h6>
                                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                              </div>
                          </div>
                      </div>
                  </a>
              </div> -->
          </div>
      </div>
  </div>


        </div>
      </div>

          
         
      </section>
      <section class="contact py-5">
        <div class="container py-3">
          <div class="row">
            <div class="col-lg-3 m-auto text-center">
              <h1>FeedBack</h1>
              <h6 style="color: red">Always Be In Touch With Us</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-9 m-auto">
              <div class="row py-5">
                <div class="col-lg-4">
                  <h6>LOCATION</h6>
                  <p>Gyalpozhing Mongar</p>
                
                  <h6>PHONE</h6>
                  <p>975+17360389</p>
                
                  <h6>EMAIL</h6>
                  <p>12210069.gcit@rub.edu.bt</p>

            </div>
            <div class="col-lg-7">
              <div class="row">

              </div>
              <div class="row">
                <form action="feedback.php" method="post"><div class="col-lg-12 py-3">
                  <textarea name="feedback" class="form-control bg-light" placeholder="Anthing we can improve?" id="" cols="10" rows="5"></textarea>
                </div>
              </div>
              <button type="submit"class="btn1" onclick="checker()">Submit</button>
              </form>


        </div>
      </section>
      
      

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