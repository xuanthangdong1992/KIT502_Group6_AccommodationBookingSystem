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
      <?php
				include ('header.php');
			?>

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
        <div class="submit-button">
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#bookingModal" >Booking</button>
		</div>
      </div>
      <!-- end Accommodation details -->

    </div>

   
    <footer>
      <div class="footer">
      </div>
    </footer>
  </div>

  <!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- booking form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Confirm booking</h1>
					<form id="bookingForm">
						<!-- <form id="loginForm" action="login_process.php" method="post"> -->
            <!-- Get user information -->
            <?php
            $username = $_SESSION["loginUsername"];
            $user_details_query = "SELECT * FROM account WHERE user_id = '$username'";
            $user_details_result = mysqli_query($conn, $user_details_query);
            $user_details_row = mysqli_fetch_array($user_details_result);
            ?>
						<div class="form-group required">
							<b><label>Client Information:</label></b><br>
              <label>Name: <?php echo $user_details_row['first_name'] .' '. $user_details_row['last_name']; ?></label><br>
              <label>Postal address: <?php echo $user_details_row['postal_address']; ?></label><br>
              <label>Email: <?php echo $user_details_row['email']; ?></label><br>
              <label>Phone number: <?php echo $user_details_row['phone_number'] ?></label><br>
            <!-- Get host information -->
            <?php
              $host_id = $row['host_id'];
              $host_details_query = "SELECT * FROM account WHERE user_id = '$host_id'";
              $host_details_result = mysqli_query($conn, $host_details_query);
              $host_details_row = mysqli_fetch_array($host_details_result);
            ?>
							<b><label>Host Information:</label></b><br>
              <label>Name: <?php echo $host_details_row['first_name'] .' '. $host_details_row['last_name']; ?></label><br>
              <label>Phone number: <?php echo $host_details_row['phone_number'] ?></label><br>

            <!-- Get accommodation information and information to payment.  -->
              <b><label>Accommodation Information:</label></b><br>
              <!-- check in date -->
              <label>Check-in on time at : <?php echo $row['check_in_time']; echo ' on ' .$_GET['startDate']; ?></label><br>
              <!-- check out date -->
              <label>Check-in on before : <?php echo $row['check_out_time']; echo ' on ' .$_GET['endDate']; ?></label><br>
              <!-- number of guests -->
              <label>Number of guests: <?php echo $_GET['numberOfGuests'] ?></label><br>
              <!-- house price -->
              <label>House price: <?php echo $row['price']; ?> AUD</label><br>
              <!-- total price -->
              <?php
              $date1=date_create($_GET['startDate']);
              $date2=date_create($_GET['endDate']);
              $subDate=date_diff($date1,$date2);
              $total_price = $subDate->format("%a")*$row['price'];
              ?>
              <label>Total price: <?php echo $total_price ?> AUD</label><br>
						</div>
					
						<div class="submit-button">
							<button type="submit" class="btn btn-primary">Payment</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Booking Modal -->

<!-- include login and register modal   -->
<?php
	include ('login-register-modal.php');
	?>
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