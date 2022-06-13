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
    <link rel="stylesheet" href="sports_football.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="about.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
              <button type="button" class="btn btn-secondary dropdown-toggle bg-dark" data-bs-toggle="dropdown" aria-expanded="false" style="display: block !important;">
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
    <br><br>
      <!-- <marquee behaviour="scroll" scrollamount="15"><font style="font-size:30px;  text-align: center;" >The GCIT's sporting events at your fingertips!</font></marquee> -->

      <div class="container table-responsive py-5 table-bordered">

        <div class=" table-responsive table-hover">
          <h1>Football Events</h1>

        <table class="table table-hover  " style="margin-top:50px">
          <thead class="table__head">
            <tr class="winner__table">
              <!-- <th>S/N</th> -->
             
              <th><i class="fas fa-user-friends	" aria-hidden="true"></i> Team A</th>
              <th><i class="fas fa-user-friends	" aria-hidden="true"></i> Team B</th>
              <th><i class="fa fa-user" aria-hidden="true"></i> Referee</th>
              <th><i class="fa fa-calendar-o" aria-hidden="true"></i> Date</th>
              <th> <i class="fas fa-clock" aria-hidden="true"></i> Time</th>
              <!-- <th><i class="fa fa-trophy" aria-hidden="true"></i> Reward</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
                include("include/includes.php");
                if ($conn->connect_error){
                    die("Connection failed:  " . $conn->connect_error);
                }
                $sql = "select * from sports where Date >= CURDATE()";
                $result = $conn->Query($sql);
                if(!$result){
                    die("Invalid query: ". $conn->error);
                }
                $type = "Football";
                while($row = $result->fetch_assoc()){
                    if ($type==$row["Type"]){
                        echo "<tr>
                            <td>" . $row["Team A"] . "</td>
                            <td>" . $row["Team B"] . "</td>
                            <td>" . $row["Referee"] . "</td>
                            <td>" . $row["Date"] . "</td>
                            <td>" . $row["Time"] . "</td>
                        </tr>";
                    }
                    
                }

            ?>
     
     
          </tbody>
        </table>
        </div>
        <br>
        <div class="container2">
          <h2>Comment</h2>
          <p><em>Use if you have issue with the current time/date. with appropriate reason!</em></p>
          <form action="#">
              <textarea placeholder="Type your comment here"></textarea>
                  <button style="color: #fff !important; background-color: #ff523b !important;" type="submit">Comment</button>
          </form>
      </div>
      </div>
      
      <section>
          <!-- <div class="container2">
              <h2>Comment</h2>
              <p><em>Use if you have issue with the current time/date. with appropriate reason!</em></p>
              <form action="login.html">
                  <textarea placeholder="Type your comment here"></textarea>
                  <div class="btn">
                      <input onclick="checker()" type="submit" value="Comment" >
                      <button id="clear">Cancel</button>
                  </div>
              </form>
          </div> -->
      </section>
      <br><br>

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