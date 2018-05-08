<!DOCTYPE html>
<html lang="en">
      <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

          <!-- Bootstrap CSS -->

          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <link rel="stylesheet" href="css/style.css">
          <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet'>
          <title>Steve and Bárbara's Boda</title>
       </head>

  <header>
      <nav class="navbar fixed-top navbar-expand-sm navbar-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Brand -->
          <a class="navbar-brand" href="http://www.steveandbarbaraboda.com">Steve and Bárbara's Boda</a><br>



          <!-- Links -->
          <div class="collapse navbar-collapse justify-content-end" id="nav-content">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" href=".../...">Home</a>
                <li class="nav-item">
                  <a class="nav-link" href=".../rsvp.php">RSVP/S.R.C</a>
                </li>
                <li class="nav-item">
                  <!--<a class="nav-link" href=".../about.html">About/Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=".../map.html">Map/Mapa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=".../contact.php">Contact/Contacto</a>-->
                </li>
              </ul>
        </nav>
    </header>

    <body>
      <main>
        <?php
          //Here we display a message if we are logged in!
          if (isset($_SESSION['u_id'])) {
            echo "You are logged in!";
          }
        ?>

        <!--Carousel-->
          <div class="container">
            <div class="row">
              <div class="col-sm-3">

              </div>
              <div class="col-sm-12">
                <div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel" style="width:auto; margin:0 auto;">
                  <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <!--carousel images stored in img/1 folder -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="img/1/1.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/1/2.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/1/3.png" alt="Third slide">
                  </div>
                </div>
                <!--carousel controls -->
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <br /><br /><br /><br />
              </div>
              <div class="col-sm-3">
              </div>
            </div>
          </div>

            <!--Countdown Clock-->

          <div class="container">
            <div class="row">
              <div class="col-sm">
              </div>
              <div class="col-sm">
                <!-- Display the countdown timer in an element -->
          <div class="container">
                <p id="demo"></p>

                <script>
                // Set the date we're counting down to
                var countDownDate = new Date("Aug 10, 2018 17:00:00").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get todays date and time
                  var now = new Date().getTime();

                  // Find the distance between now an the count down date
                  var distance = countDownDate - now;

                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Display the result in the element with id="demo"
                  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                  + minutes + "m " + seconds + "s ";

                  // If the count down is finished, write some text
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                  }
                }, 1000);
                </script>
              </div>
              <P class="days">Days until we are Mr and Mrs</p><br /><br /><br /><br />
              </div>
              <div class="col-sm">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-sm">
              </div>
              <div class="col-sm">
                <div class="main-container">
  	<div class="main-wrapper">
      <h2>Login</h2>
      <?php

      //Here is our login form!
      //Notice that we check if we have a SESSION variable named "u_id". The "u_id" is created in our login script in login.inc.php, and will only exist if the user is logged in!

      //If the user is logged in ("u_id" does exist), then we display the logout form
      if (isset($_SESSION['u_id'])) {
        echo '<form action="includes/logout.inc.php" method="POST">
          <button type="submit" name="submit">Logout</button>
        </form>';
      }
      //If the user is not logged in ("u_id" doesn't exist), then we display the login form
      else {
        echo '<form action="includes/login.inc.php" method="POST">
          <input type="password" name="pwd" placeholder="password">
          <button type="submit" name="submit">Login</button>
        </form>
        <a href="signup.php"></a>';
      }
      ?>
  	</div>
  </div>
              </div>
              <div class="col-sm">
              </div>
            </div>
          </div>
<?php
    include_once 'footer.php';
 ?>
