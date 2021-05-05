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

	<title>Accommodation Booking System - Group 6</title>

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
            <!-- Get user information -->
            <?php
            $username = $_SESSION["loginUsername"];
            $user_details_query = "SELECT * FROM account WHERE user_id = '$username'";
            $user_details_result = mysqli_query($conn, $user_details_query);
            $user_details_row = mysqli_fetch_array($user_details_result);
            ?>
						<div class="form-group required">
							<h5><label>Client Information:</label></h5>
              <div class="row">
                <label class="col-5"><b>Name: </b></label>
                <label class="col-7"><?php echo $user_details_row['first_name'] .' '. $user_details_row['last_name']; ?></label><br>
              </div>
              <div class="row">
                <label class="col-5"><b>Postal address: </b></label>
                <label class="col-7"><?php echo $user_details_row['postal_address']; ?></label><br>
              </div>
              <div class="row">
                <label class="col-5"><b>Email: </b></label>
                <label class="col-7"><?php echo $user_details_row['email']; ?></label><br>
              </div>
              <div class="row">
                <label class="col-5"><b>Phone number: </b></label>
                <label class="col-7"><?php echo $user_details_row['phone_number'] ?></label><br>
              </div>
            <!-- Get host information -->
            <?php
              $host_id = $row['host_id'];
              $host_details_query = "SELECT * FROM account WHERE user_id = '$host_id'";
              $host_details_result = mysqli_query($conn, $host_details_query);
              $host_details_row = mysqli_fetch_array($host_details_result);
            ?>

							<h5><label>Host Information:</label></h5>
              <div class="row">
                <label class="col-5"><b>Name: </b></label>
                <label class="col-7"><?php echo $host_details_row['first_name'] .' '. $host_details_row['last_name']; ?></label><br>
              </div>
              <div class="row">
                <label class="col-5"><b>Phone number: </b></label>
                <label class="col-7"><?php echo $host_details_row['phone_number'] ?></label><br>
              </div>
              <!-- Get accommodation information and information to payment.  -->
              <h5><label>Accommodation Information:</label></h5>
              <div class="row">
                <!-- check in date -->
                <label class="col-5"><b>Check-in time:</b></label>
                <label class="col-7"><?php echo $row['check_in_time']; echo ' on ' .$_GET['startDate']; ?></label><br>
              </div>
              <div class="row">
                <!-- check out date -->
                <label class="col-5"><b>Check-out before:</b></label>
                <label class="col-7"><?php echo $row['check_out_time']; echo ' on ' .$_GET['endDate']; ?></label><br>
              </div>
              <div class="row">
                <!-- number of guests -->
                <label class="col-5"><b>Guest(s): </b></label>
                <label class="col-7"><?php echo $_GET['numberOfGuests'] ?></label><br>
              </div>
              <div class="row">
                <!-- house price -->
                <label class="col-5"><b>House price: </b></label>
                <label class="col-7"><?php echo $row['price']; ?> AUD</label><br>
              </div>
              <?php
              $startDate=date_create($_GET['startDate']);
              $endDate=date_create($_GET['endDate']);
              $subDate=date_diff($startDate,$endDate);
              $total_price = $subDate->format("%a")*$row['price'];
              ?>
              <div class="row">
                <!-- nights stay -->
                <label class="col-5"><b>Night stay(s): </b></label>
                <label class="col-7"><?php echo $subDate->format("%a") ?></label><br>
              </div>
              <div class="row">
              <!-- total price -->
              <label class="col-5"><b>Total price: </b></label>
              <label class="col-7"><?php echo $total_price ?> AUD</label><br>
              </div>
						</div>
						<div class="submit-button">
							<button type="button" class="btn btn-primary" name="btn_send_booking" id="btn_send_booking">Send Booking</button>
						</div>
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
  //Booking process

   //logout process
   $(document).ready(function() {
				$('#logout').click(function() {
					var logout = "logout";
					$.ajax({
						url: "login_process.php",
						method: "POST",
						data: {
							logout: logout
						},
						success: function() {
							location.reload();
						}
					});
				});

			});


  // Get value
  // var 
    $(document).ready(function(){  
      var queryString = window.location.search;
      var urlPar = new URLSearchParams(queryString);
      var number_of_guests = urlPar.get('numberOfGuests');
      var start_date = urlPar.get('startDate');
      var end_date = urlPar.get('endDate');
      var accommodation_id = urlPar.get('id');
      var client_id = '<?php echo $username; ?>';
      $("#btn_send_booking").click(function() {
      var values = {
        'client_id': client_id,
        'accommodation_id': accommodation_id,
        'start_date': start_date,
        'end_date': end_date,
        'number_of_guests': number_of_guests,
        'booking_status': "pending"
      };
      $.ajax({
							url: "booking-process.php",
							method: "POST",
							data: values,
							// get success message from server
							success: function(data) {
								// if respond from server is "duplicate_user_id"
                if(data=='success'){
                  alert("Booking send success! Please waiting confirm from host! Thank you");
                  location.href = "index.php";
                }
							}
						});
    });


    });
    
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