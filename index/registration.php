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
								<li class="nav-item">
									<a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="" data-toggle="modal" data-target="#registerModal">Register</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>

				<!-- end bootstrap navigation bar -->
			</header>

		<!-- register form -->
		<div class="form">
			<h1>Register new account</h1>
			<form id="registrationForm" action="" method="post">
				<div class="form-group required">
					<div>
						<label class="label-control">Account Type:</label>
						<input type="radio" id="host" name="accountType" value="host"/>
						<label for="host">Host</label>
						<input type="radio" id="client" name="accountType" value="client" checked="checked" />
						<label for="client">Client</label>
					</div>
				</div>

				<div class="form-group required">
					<label class="label-control">Username:</label>
					<input class="form-control" type="text" id="username" name="username"/>
				</div>
				<div class="form-group required">
					<label class="label-control">Password:</label>
					<input class="form-control" type="password" id="password" name="password"/>
				</div>
				<div class="form-group required">
					<label class="label-control">Confirm Password:</label>
					<input class="form-control" type="password" id="confirmPass" name="confirmPass"/>
				</div>


				<div class="form-group required">
					<label class="label-control">First Name:</label>
					<input class="form-control" type="text" id="firstName" name="firstName"/>
				</div>
				<div class="form-group required">
					<label class="label-control">Last Name:</label>
					<input class="form-control" type="text" id="lastName" name="lastName"/>
				</div>
				<div class="form-group required">
					<label class="label-control">Email:</label>
					<input class="form-control" type="text" id="email" name="email"/>
				</div>
				<div class="form-group required">
					<label class="label-control">Phone Number:</label>
					<input class="form-control" type="text" id="phoneNumber" name="phoneNumber"/>
				</div>
				<div class="form-group required">
					<label class="label-control">Postal Address:</label>
					<input class="form-control" type="text" id="postalAddress" name="postalAddress"/>
				</div>
				<div id="hostOrClient" class="form-group required">
					<label class="label-control">ABN Number:</label>
					<input class="form-control" type="text" id="abnNumber" name="abnNumber"/>
				</div>
				<div class="submit-button">
					<button type="submit" class="btn btn-primary">Register</button> 
				</div>


			</form>
		</div>
		<!-- end register form -->
		<footer>
  			<div class="footer">    
  			</div>
		</footer>
	</div>

	<!-- hide and show abn number follow the choice host or client -->
	<script type="text/javascript">

		$(document).ready(function() {
	 	// hide and show abn number follow the choice host or client
	 	$("#hostOrClient").hide();
	 	$('input:radio[name=accountType]').change(function() {
	 		if (this.value == 'host') {
	 			$("#hostOrClient").show();
	 		}
	 		else if (this.value == 'client') {
	 			$("#hostOrClient").hide();
	 		}
	 	});
	 });
		//validate register form
		$(document).ready(function() {
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
					form.submit();
				}
			});
			//validate password
			$.validator.addMethod("passwordcheck", function(value) {
		   	return /[a-z]/.test(value) // has at least 1 lowercase letter
		       && /[A-Z]/.test(value) // has at least 1 uppercase letter
		       && /\d/.test(value) // has at least 1 digit
		       && /[!@#\$%]/.test(value) // has at least 1 following special characters ! @ # $ %
		   	});
		   	//validate phone number
		   	$.validator.addMethod("phonecheck", function(value) {
		   	return /^[0-9]*$/.test(value) // has at least 1 lowercase letter
		   	});
		});

	</script>
</body>
</html>