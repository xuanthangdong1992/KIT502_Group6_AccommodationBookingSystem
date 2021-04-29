<!DOCTYPE html>
<?php
include('session.php');
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


	<div class="form-bg">
		<div class="main-page">
			<header>
				<!-- bootstrap navigation bar -->
				<nav class="navbar navbar-expand-lg navbar-dark static-top">
					<div class="container">
						<a href="index.html">
							<img class="logo" src="../img/logo.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarResponsive">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item active">
									<a class="nav-link" href="index.html">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<!-- Display wellcome status when login sucess -->
								<?php
								if (isset($_SESSION['loginUsername'])) {
								?>
									<li class="nav-item">
										<a class="nav-link" href="">Welcome <?php echo $_SESSION['loginUsername']; ?></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="" id="logout">Logout</a>
									</li>
								<?php
								} else {


								?>
									<li class="nav-item">
										<a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="" data-toggle="modal" data-target="#registerModal">Register</a>
									</li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</nav>

				<!-- end bootstrap navigation bar -->
			</header>

			<!-- searching -->
			<div class="index-banner">
				<form id="search-accommodation-form" action="list-accommodation.html" method="post">
					<div class="row">
						<!-- city -->
						<div class="form-group col">
							<label>City:</label>
							<input class="form-control" type="text" id="city" name="city" />
						</div>
						<!-- start date booking -->
						<div class="form-group col">
							<label>Start Date:</label>
							<input class="form-control" type="date" id="startDate" name="startDate" width="276" />
						</div>
						<!-- end date booking -->
						<div class="form-group col">
							<label>End Date:</label>
							<input class="form-control" type="date" id="endDate" name="endDate" width="276" />
						</div>
						<!-- number of guests -->
						<div class="form-group col">
							<label>Number of guests</label>
							<select class="form-control" id="numberOfGuest" name="numberOfGuest">
								<option>Select ...</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</div>
					</div>
					<div class="btnSearch">
						<button type="submit" class="btn btn-primary">Search</button>
					</div>

				</form>
			</div>

		</div>
	</div>

	<!-- Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- login form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Login</h1>
					<form id="loginForm">
						<!-- <form id="loginForm" action="login_process.php" method="post"> -->
						<div class="form-group required">
							<label class="label-control">Username:</label>
							<input class="form-control" type="text" id="loginUsername" name="loginUsername" />
						</div>
						<div class="form-group required">
							<label class="label-control">Password:</label>
							<input class="form-control" type="password" id="loginPass" name="loginPass" />
						</div>
						<div class="submit-button">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Login Modal -->
	<!-- Register Modal -->
	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- register form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Register</h1>

					<form id="registrationForm" action="registrationProcess.php" method="post">
						<div class="form-group required">
							<div>
								<label class="label-control">Account Type:</label>
								<input type="radio" class="accountType" name="accountType" value="host" />
								<label for="host">Host</label>
								<input type="radio" class="accountType" name="accountType" value="client" checked="checked" />
								<label for="client">Client</label>
							</div>
						</div>

						<div class="form-group required">
							<label class="label-control">Username:</label>
							<input class="form-control" type="text" id="username" name="username" />
						</div>
						<div class="form-group required">
							<label class="label-control">Password:</label>
							<input class="form-control" type="password" id="password" name="password" />
						</div>
						<div class="form-group required">
							<label class="label-control">Confirm Password:</label>
							<input class="form-control" type="password" id="confirmPass" name="confirmPass" />
						</div>


						<div class="form-group required">
							<label class="label-control">First Name:</label>
							<input class="form-control" type="text" id="firstName" name="firstName" />
						</div>
						<div class="form-group required">
							<label class="label-control">Last Name:</label>
							<input class="form-control" type="text" id="lastName" name="lastName" />
						</div>
						<div class="form-group required">
							<label class="label-control">Email:</label>
							<input class="form-control" type="text" id="email" name="email" />
						</div>
						<div class="form-group required">
							<label class="label-control">Phone Number:</label>
							<input class="form-control" type="text" id="phoneNumber" name="phoneNumber" />
						</div>
						<div class="form-group required">
							<label class="label-control">Postal Address:</label>
							<input class="form-control" type="text" id="postalAddress" name="postalAddress" />
						</div>
						<div id="hostOrClient" class="form-group required">
							<label class="label-control">ABN Number:</label>
							<input class="form-control" type="text" id="abnNumber" name="abnNumber" />
						</div>
						<div class="submit-button">
							<button type="submit" class="btn btn-primary" name="register_button">Register</button>
						</div>
					</form>
				</div>

			</div>
		</div>
		<!-- End Register Modal -->


		<script type="text/javascript">
			<?php if (isset($_POST['btn_register'])) { ?> /* Your (php) way of checking that the form has been submitted */

				$(function() { // On DOM ready
					$('#registerModal').modal('show'); // Show the modal
				});

			<?php } ?>


			//validation search form
			$(document).ready(function() {
				$('form[id="search-accommodation-form"]').validate({
					rules: {
						city: 'required',
						startDate: 'required',
						endDate: 'required',
						numberOfGuest: {
							digits: true
						}
					},
					messages: {
						city: '<span class="error">This field is required</span>',
						startDate: '<span class="error">This field is required</span>',
						endDate: '<span class="error">This field is required</span>',
						numberOfGuest: '<span class="error">This field is required</span>'
					},
					submitHandler: function(form) {
						form.submit();
					}
				});
			});
			// validate start date and end date
			var td = new Date();
			var mm = td.getMonth() + 1;
			var dd = td.getDate();
			var yyyy = td.getFullYear();
			if (mm < 10)
				mm = '0' + mm.toString();
			if (dd < 10)
				dd = '0' + dd.toString();

			var minDate = yyyy + '-' + mm + '-' + dd;
			$('#startDate').attr('min', minDate);
			$('#endDaten').attr('min', minDate);
			// the check-in date is always greater than the checkout date 
			var sd = document.getElementById('startDate');
			var ed = document.getElementById('endDate');

			sd.addEventListener('change', function() {
				if (sd.value)
					ed.min = sd.value;
			}, false);
			ed.addEventListener('change', function() {
				if (ed.value)
					sd.max = ed.value;
			}, false);

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
								// if respond from server is "No"
								if (data == 'fail') {
									alert("Wrong user id or password.");
								} else {
									$('#loginModal').hide();
									location.reload();
								}
							}
						});
					}
				});


			});


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
								if (data == 'fail'){
									alert("Something wrong! Please register again.");
								}else
								{
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
		</script>
</body>

</html>