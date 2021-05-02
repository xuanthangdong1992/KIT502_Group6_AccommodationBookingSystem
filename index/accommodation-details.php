<!DOCTYPE html>
<?php
include ('session.php');
include ('db_conn.php');
?>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Main CSS file -->
	<link rel="stylesheet" href="../css/clientstyle.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<title>Accommodation Booking System - Group test</title>

</head>
<body>
	<!-- jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<!-- support call ajax -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


  <?php
    $accommodation_id = $_GET['id'];
    $query = "SELECT * FROM accommodation
    WHERE accommodation_id = '$accommodation_id'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
  ?>
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
      <?php
        $arr_img = explode(";", $row["image"]);
        for ($i = 1; $i <= count($arr_img); $i++) {
          
      ?>
         <div class="mySlides">
          <div class="numbertext"><?php echo $i;?>/<?php echo count($arr_img);?></div>
          <img class="img-slide" src="<?php echo $arr_img[$i-1]?>">
        </div>

      <?php
        }
      ?>
        <a class="prev" onclick="plusSlides(-1)">❮❮</a>
        <a class="next" onclick="plusSlides(1)">❯❯</a>
      </div>
      <!-- end slider -->
      <!-- Accommodation details -->
      <div class="content-details">
        <h1><?php echo $row["house_name"];?></h1>
        <h5>Description: </h5>
        <p><?php echo $row["description"];?></p>
        <p><b>Price: <?php echo $row["price"];?> AUD</b></p>
        <p><b>Number of room:</b> <?php echo $row["number_of_room"];?></p>
        <p><b>Number of bathroom:</b> <?php echo $row["number_of_bathroom"];?></p>
        <p><b>Smoke_allowed:</b> <?php echo $row["smoke_allowed"]==1?'Yes':'No';?></p>
        <p><b>Garage:</b> <?php echo $row["garage"]==1?'Yes':'No';?></p>
        <p><b>Pet friendly:</b> <?php echo $row["pet_friendly"]==1?'Yes':'No';?></p>
        <p><b>Internet provided:</b> <?php echo $row["internet_provided"]==1?'Yes':'No';?></p>
        <p><b>Check-in time:</b><?php echo $row["check_in_time"];?></p>
        <p><b>Check-out time:</b><?php echo $row["check_out_time"];?></p>
        <p><b>Address:</b> <?php echo $row["address"];?></p>
        <p><b>City:</b> <?php echo $row["city"];?></p>
        <p><b>Postal code:</b> <?php echo $row["postal_code"];?></p>
        <p><b>State:</b> <?php echo $row["state"];?></p>
        <p><b>Max-guests-allowed:</b> <?php echo $row["max_guests_allowed"];?></p>
        <p><b>Accommodation_rate:</b> <span class="fa fa-star checked"></span><?php echo $row["accommodation_rate"];?></p>
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