<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Main CSS file -->
  <link rel="stylesheet" href="../css/clientstyle.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- icon star -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Accommodation Assignment - Group 6</title>

</head>
<body>
  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- validation plugin -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


  <div class="regis-bg">
    <header>
      <!-- bootstrap navigation bar -->
      <nav class="navbar navbar-expand-lg navbar-dark static-top">
        <div class="container">
          <a href="index.php">
            <img class="logo" src="../img/logo.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registration.html">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- end bootstrap navigation bar -->
    </header>

    <h1>Accommodation details</h1>
    <div>
      <!-- slider -->
      <div class="container">
        <div class="mySlides">
          <div class="numbertext">1 / 6</div>
          <img class="img-slide" src="../img/img-slide1.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">2 / 6</div>
          <img class="img-slide" src="../img/img-slide2.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">3 / 6</div>
          <img class="img-slide" src="../img/img-slide3.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">4 / 6</div>
          <img class="img-slide" src="../img/img-slide4.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">5 / 6</div>
          <img class="img-slide" src="../img/img-slide5.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">6 / 6</div>
          <img class="img-slide" src="../img/img-slide6.jpg">
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮❮</a>
        <a class="next" onclick="plusSlides(1)">❯❯</a>
      </div>
      <!-- end slider -->
      <!-- Accommodation details -->
      <div class="content-details">
        <h1>House on the Hill Bed and Breakfast</h1>
        <p>House on the HILL provides a country retreat only 2 minutes from the bustling town of Huonville<br>
        We provide a great menu with local produce-paddock to the plate experience and also sell wine-so you don't have to leave the Mountain,just relax.<br>
        <b>The space</b><br>
        We are a great hosts who have a great Dinner Menu for our Guests too choose from,and we a not expensive.<br>
        Also we serve Tasmanian Wines and Australian Wines<br>
        <b>Guest access</b><br>
        We have Great Observation Decks to watch The Night Animals<br>
        <b>Licence number</b><br>
        Exempt: This listing is a hotel, motel, or caravan park</p>
        <p><b>Price: 1,560 AUD</b></p>
        <p><b>Number of room:</b> 4</p>
        <p><b>Number of bathroom:</b> 2</p>
        <p><b>Smoke_allowed:</b> yes</p>
        <p><b>Garage:</b> yes</p>
        <p><b>Pet friendly:</b> no</p>
        <p><b>Internet provided:</b> yes</p>
        <p><b>Check-in time:</b>12:00 PM</p>
        <p><b>Check-out time:</b>11:30 AM</p>
        <p><b>Address:</b> 19 Redwood Rd, Kingston, TAS 7050</p>
        <p><b>City:</b> Hobart</p>
        <p><b>Postal code:</b> 7050</p>
        <p><b>State:</b> TAS</p>
        <p><b>Max-guests-allowed:</b> 5</p>
        <p><b>Accommodation_rate:</b> <span class="fa fa-star checked"></span>4.3</p>
      </div>
      <!-- end Accommodation details -->
    </div>
    <footer>
      <div class="footer">
      </div>
    </footer>
  </div>
  <script>
    //slider
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slides[slideIndex-1].style.display = "block";
        }
  </script>

</body>
</html>