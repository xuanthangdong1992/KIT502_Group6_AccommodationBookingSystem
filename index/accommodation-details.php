<!DOCTYPE html>
<?php
include ('session.php');
include ('db_conn.php');
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Accommodation Booking System - Group 6</title>
	<!-- Local CSS file -->
	<link rel="stylesheet" href="../css/clientstyle.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Icon font  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>
<body>
	<!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- Bootstrap   -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


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
        <p><b>Smoke allowed:</b> <?php echo $row["smoke_allowed"]==1?'Yes':'No';?></p>
        <p><b>Garage:</b> <?php echo $row["garage"]==1?'Yes':'No';?></p>
        <p><b>Pet friendly:</b> <?php echo $row["pet_friendly"]==1?'Yes':'No';?></p>
        <p><b>Internet provided:</b> <?php echo $row["internet_provided"]==1?'Yes':'No';?></p>
        <p><b>Check-in time:</b><?php echo $row["check_in_time"];?></p>
        <p><b>Check-out time:</b><?php echo $row["check_out_time"];?></p>
        <p><b>Address:</b> <?php echo $row["address"];?></p>
        <p><b>City:</b> <?php echo $row["city"];?></p>
        <p><b>Postal code:</b> <?php echo $row["postal_code"];?></p>
        <p><b>State:</b> <?php echo $row["state"];?></p>
        <p><b>Max guests allowed:</b> <?php echo $row["max_guests_allowed"];?></p>
        <div class="submit-button">
          <button class="btn btn-primary btn-lg btn-block" type="button" id="btn_booking" name="btn_booking" onclick="bookingProcess()">Booking</button>
        </div>
        <div class="submit-button">
          <button class="btn btn-warning btn-lg btn-block" type="button" id="btn_contact_host" name="btn_contact_host" onclick="contactHost()">Contact Host</button>
        </div>
        <hr class="solid">
        <!-- Accommodation review and rating -->
        <?php
          $queryAccommodationReview = "SELECT * FROM accommodation_review
          WHERE accommodation_id = '$accommodation_id'";
          $resultAccommdationReview = mysqli_query($conn, $queryAccommodationReview);
          $countReviews = mysqli_num_rows($resultAccommdationReview);

        ?>
        <p><b>Accommodation rate:</b> <i class="bi bi-star-fill" style="color: red;"></i> <?php echo number_format($row["accommodation_rate"], 1);?> (<?php echo $countReviews; ?> reviews)</p>
        <!-- Review list   -->
        <!-- end Accommodation details -->
        <button class="btn btn-primary" type="button" id="btn_leave_review" name="btn_leave_review" onclick="checkLoginLeaveReview()">Leave a review!</button><br><br>

        <?php
        //just show 5 reviews. If client want to see more, they can click to view all reviews button. 
        $i = 0;
        foreach($resultAccommdationReview as $review){
        $i++;
        ?>
        <div class="card border-info mb-12">
          <div class="card-header">User: <?php echo $review["client_id"] ?> </div>
          <div class="card-body text-info">
            <p class="card-text"><i class="bi bi-star-fill" style="color: red;"></i> <?php echo $review["rate"] ?></p>
            <p class="card-title"><?php echo $review["comment"] ?></p>
          </div>
        </div><br>
        <?php
          if($i == 5){
            break;
          }
          }
        ?>
        <div class="submit-button">
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#reviewModal" >View all <?php echo $countReviews; ?> reviews</button>
        </div>
      </div>
      
      

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

   <!-- review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- booking form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>All reviews</h1>
            <!-- Get user information -->
            <?php
        foreach($resultAccommdationReview as $review){
        ?>
        <div class="card border-info mb-12">
          <div class="card-header">User: <?php echo $review["client_id"] ?> </div>
          <div class="card-body text-info">
            <p class="card-text"><i class="bi bi-star-fill" style="color: red;"></i> <?php echo $review["rate"] ?></p>
            <p class="card-title"><?php echo $review["comment"] ?></p>
          </div>
        </div><br>
        <?php
          }
        ?>

				</div>
			</div>
		</div>
	</div>
	<!-- End review Modal -->

  <!-- Leave review Modal -->
  <div class="modal fade" id="leaveReviewModal" tabindex="-1" role="dialog" aria-labelledby="leaveReviewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- payment form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Edit review</h3>
                    <!-- Get review details -->
                       <div class="form-group">
                            <label for="rate">Rate:</label>
							<select class="form-control" id="rate" name="rate">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5" selected>5</option>
							</select>
						</div>
                        <div class="form-group">
                            <label for="comment">Enter comment: </label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg btn-block" name="btn_leave_review" id="btn_leave_review" onclick = "leave_review('<?php echo $accommodation_id; ?>', '<?php echo $username; ?>')">Submit</button>
						</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End leave review Modal -->


  <!-- Contact Host Modal -->
  <div class="modal fade" id="contactHostModal" tabindex="-1" role="dialog" aria-labelledby="contactHostModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- payment form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Contact Host</h3>

                        <div class="form-group">
                            <label for="comment">Leave a message for host: </label>
                            <textarea class="form-control" id="mes_content" name="mes_content" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg btn-block" name="btn_leave_review" id="btn_leave_review" onclick = "leave_message('<?php echo $username; ?>', '<?php echo $host_id; ?>')">Send Message</button>
						</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End Contact Host Modal -->


<!-- include login and register modal   -->
  <?php
	  include ('login-register-modal.php');
	?>
  <script type="text/javascript">

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
							location.href="index.php";
						}
					});
				});

			});

  //Booking process
function bookingProcess(){
  //Check login before booking
  $.ajax({
							url: "booking-process.php",
							method: "POST",
							data: {
                action: "check_login"
              },
							// get success message from server
							success: function(data) {
								// if respond from server is "duplicate_user_id"
                if(data=='need_login'){
                  alert("You have to login before access the booking function. Thank you!");
                }else{
                  $('#bookingModal').modal();
                  // login already 
                    var queryString = window.location.search;
                    var urlPar = new URLSearchParams(queryString);
                    var number_of_guests = urlPar.get('numberOfGuests');
                    var start_date = urlPar.get('startDate');
                    var end_date = urlPar.get('endDate');
                    var accommodation_id = urlPar.get('id');
                    var client_id = '<?php echo $username; ?>';
                    var total_price = '<?php echo $total_price; ?>';
                    $("#btn_send_booking").click(function() {
                    var values = {
                      'client_id': client_id,
                      'accommodation_id': accommodation_id,
                      'start_date': start_date,
                      'end_date': end_date,
                      'number_of_guests': number_of_guests,
                      'total_price': total_price,
                      'booking_status': "pending",
                      'action': 'booking_process'
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
                }
							}
						});
          }

//check login before leave review
          function checkLoginLeaveReview(){
            $.ajax({
							url: "booking-process.php",
							method: "POST",
							data: {
                action: "check_login"
              },
							// get success message from server
							success: function(data) {
								// if respond from server is "duplicate_user_id"
                if(data=='need_login'){
                  alert("You have to login to contact to host. Thank you!");
                }else{
                  $('#leaveReviewModal').modal();
                }
							}
						});
          }

// leave a review
function leave_review(accommodation_id, client_id){
    var rate = $('#rate').val();
    var comment = $('#comment').val();
      $.ajax({

    url: "leave_review_process.php",
    method: "POST",
    data: {
      accommodation_id: accommodation_id,
      client_id: client_id,
      rate: rate,
      comment: comment
    },
    success: function(data) {
                    if (data == "success"){
                        alert("Review success!");
                        location.reload();
                    }
    }
    });
}


function contactHost(){
  $.ajax({
							url: "booking-process.php",
							method: "POST",
							data: {
                action: "check_login"
              },
							// get success message from server
							success: function(data) {
								// if respond from server is "duplicate_user_id"
                if(data=='need_login'){
                  alert("You have to login to contact to host. Thank you!");
                }else{
                  $('#contactHostModal').modal();
                }
							}
						});
}
//leave a message for host - contact host
function leave_message(client_id, host_id){
  var mes_content = $('#mes_content').val();
                if(mes_content != ""){
                    $.ajax({
                        url: "client_inbox_process.php",
                        method: "POST",
                        data: {
                            client_id: client_id,
                            host_id: host_id,
                            mes_content: mes_content ,
                            action: "leave_message"
                        },
                        success: function(data) {
                            if(data == "success"){
                                alert("Send message success!");
                                location.reload();                            
                              }
                        }
                    });
                }
}
    
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


        //show and hide ABN Number
			$(document).ready(function() {
				// hide and show abn number follow the choice host or client
				$("#hostOrClient").hide();
				$('input:radio[name=accountType]').change(function() {
					if (this.value == 'host') {
						$("#hostOrClient").show();
					} else if (this.value == 'client') {
						$("#hostOrClient").hide();
					}
				});
			});


			// process register form
			$(document).ready(function() {
				// validate register form
				$('form[id="registrationForm"]').validate({
					rules: {
						username: 'required',
						password: {
							required: true,
							minlength: 6,
							maxlength: 12,
							passwordcheck: true
						},
						confirmPass: {
							required: true,
							equalTo: "#password"
						},
						firstName: 'required',
						lastName: 'required',
						email: {
							required: true,
							email: true
						},
						phoneNumber: {
							required: true,
							phonecheck: true
						},
						postalAddress: 'required',
						abnNumber: 'required',
					},
					messages: {
						username: '<span class="error">This field is required</span>',
						password: '<span class="error">Password is 6 to 12 characters in length and contains at least 1 lower case letter, 1 upper case letter, 1 number and 1 of following characters ! @ # $ %</span>',
						confirmPass: '<span class="error">The confirm password not matching</span>',
						firstName: '<span class="error">This field is required</span>',
						lastName: '<span class="error">This field is required</span>',
						email: '<span class="error">The email not valid</span>',
						phoneNumber: '<span class="error">This field is required and phone number contains only number</span>',
						postalAddress: '<span class="error">This field is required</span>',
						abnNumber: '<span class="error">This field is required</span>',
					},
					submitHandler: function(form) {
						//use ajax to send request to server.
						// use ajax to send request to server
						var accountType = $('.accountType:checked').val();
						var username = $('#username').val();
						var password = $('#password').val();
						var firstName = $('#firstName').val();
						var lastName = $('#lastName').val();
						var email = $('#email').val();
						var phoneNumber = $('#phoneNumber').val();
						var postalAddress = $('#postalAddress').val();
						var abnNumber = $('#abnNumber').val();


						$.ajax({
							url: 'registrationProcess.php',
							method: 'POST',
							data: {
								accountType: accountType,
								username: username,
								password: password,
								firstName: firstName,
								lastName: lastName,
								email: email,
								phoneNumber: phoneNumber,
								postalAddress: postalAddress,
								abnNumber: abnNumber
							},
							// get success message from server
							success: function(data) {
								// if respond from server is "duplicate_user_id"
								if (data == 'duplicate_user_id') {
									alert("User id already exists, please enter another user id.");

								} else
									// if respond from server is "duplicate_email"
									if (data == 'duplicate_email') {
										alert("The email is already in use by another account. Please enter another email or contact us for help.");

									} else
									// if respond from server is "duplicate_phone_number"
									if (data == 'duplicate_phone_number') {
										alert("The phone number is already in use by another account. Please enter another phone number or contact us for help.");

									} else
									// if respond from server is "duplicate_abn_number"
									if (data == 'duplicate_abn_number') {
										alert("The ABN number is already in use by another account. Please enter another ABN number or contact us for help.");

									} else
								if (data == 'fail') {
									alert("Something wrong! Please register again.");
								} else {
									alert("Register successful!");
									$('#registerModal').hide();
									location.reload();
								}
							}
						});

					}
				});
				//password check
				$.validator.addMethod("passwordcheck", function(value) {
					return /[a-z]/.test(value) // has at least 1 lowercase letter
						&&
						/[A-Z]/.test(value) // has at least 1 uppercase letter
						&&
						/\d/.test(value) // has at least 1 digit
						&&
						/[!@#\$%]/.test(value) // has at least 1 following special characters ! @ # $ %
				});
				//phone number check
				$.validator.addMethod("phonecheck", function(value) {
					return /^[0-9]*$/.test(value) // has at least 1 lowercase letter
				});
			});

      // process form login
			$(document).ready(function() {
				// validate login form
				$('form[id="loginForm"]').validate({
					rules: {
						loginUsername: 'required',
						loginPass: 'required',
					},
					messages: {
						loginUsername: '<span class="error">This field is required</span>',
						loginPass: '<span class="error">This field is required</span>',
					},
					submitHandler: function(form) {
						// use ajax to send request to server
						var loginUsername = $('#loginUsername').val();
						var loginPass = $('#loginPass').val();
						$.ajax({
							url: 'login_process.php',
							method: 'POST',
							data: {
								loginUsername: loginUsername,
								loginPass: loginPass
							},
							// get success message from server
							success: function(data) {
							// alert(data);
							// if respond from server is "fail"
								if (data == 'fail') {
									alert("Wrong user id or password.");
								} else
								// if login account is client
								if (data == 'client') {
									$('#loginModal').hide();
									location.reload();
								} else
									// if login account is host
								if (data == 'host') {
									$('#loginModal').hide();
									location.href = "host_dashboard/host-dashboard.php";
								} else
								// if login account is system manager
								if (data == 'system_manager') {
									$('#loginModal').hide();
									location.href = "manager_dashboard/Manager_Dashboard_Home.php";
								}
							}
						});
					}
				});


			});
  </script>

</body>
</html>