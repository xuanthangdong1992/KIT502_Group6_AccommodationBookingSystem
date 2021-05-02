<!DOCTYPE html>
<?php
include('session.php');
?>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>Host Dashboard</title>
    <!-- This page plugin CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- Main CSS file -->
	<link rel="stylesheet" href="../../css/clientstyle.css">
	
</head>

<body>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<!-- support call ajax -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <div class="management-nav">
    <header>
                <!-- bootstrap navigation bar -->
                <nav class="navbar navbar-expand-lg navbar-dark static-top">
                    <div class="container">
                        <a href="host-dashboard.php">
                            <img class="logo" src="../../img/logo.png" alt="">
                        </a>
                        <h2 style="color: white">Welcome to Host accommodation management</h2>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="host-dashboard.php">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-dashboard-booking.php">Host Booking management</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" href="host-client-review.php">Review</a>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="host-inbox.php">Inbox</a>
                                </li>
                                <!-- Display wellcome status when login sucess -->
								<?php
								if (isset($_SESSION['loginUsername'])) {
									// check permission if login account is host
									if ($_SESSION["permission"] == "host") {
								?>
										<li class="nav-item">
											<a class="nav-link" href="">Welcome <?php echo $_SESSION['loginUsername']; ?></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" id="logout">Logout</a>
										</li>
									<?php
									} else 
									if ($_SESSION["permission"] == "client") {
										// redirect to client page
										echo "<script>
										alert('Sorry! Your account is not allowed to access this website!');
										window.location.href='indexbackup.php';
										</script>";
									} else 
									if ($_SESSION["permission"] == "system_manager") {
										// redirect to manager page
										echo "<script>
										alert('Sorry! Your account is not allowed to access this website!');
										window.location.href='Manager_Dashboard_Home.php';
										</script>";
									}
								} else {
									?>
									<li class="nav-item">
										<a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
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
    </div>

    <!--This is one container with two cards-->
    <div class="row">
        <!-- This is a card to link to User Management Dashboard -->
        <div class="col-lg-6">
            <div class="card">
                <img class="card-img-top" src="../../img/M3.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h3 class="font-normal">Booking Management Dashboard</h3>
                    <!--When click on the button, the page will jump to User Management Dashboard-->
                    <a href="host-dashboard-booking.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Booking Management</a>
                </div>
            </div>
        </div>
        <!-- This is a card to link to User Management Dashboard -->
        <div class="col-lg-6">
            <div class="card">
                <img class="card-img-top" src="../../img/M2.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h3 class="font-normal">Accomdation Management Dashboard</h3>
                    <!--When click on the button, the page will jump to User Management Dashboard-->
                    <a href="host-dashboard-accommodation.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Manage Accommodations Here</a>
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

		<script type="text/javascript">

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
										location.href = "index.php";
									} else
										// if login account is host
										if (data == 'host') {
											$('#loginModal').hide();
											location.href = "host-dashboard.php";
										} else
											// if login account is system manager
											if (data == 'system_manager') {
												$('#loginModal').hide();
												location.href = "Manager_Dashboard_Home.php";
											}
							}
						});
					}
				});


			});

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
		</script>
        
    </body>
</html>