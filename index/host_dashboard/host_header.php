<html>
    <head>
    </head>
    <body>
    <header>
				<!-- bootstrap navigation bar -->
				<nav class="navbar navbar-expand-lg navbar-dark static-top">
					<div class="container">
						<a href="index.php">
							<img class="logo" src="../../img/logo.png" alt="">
						</a>
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
								<!-- Display well come status when login success -->
								<?php
								if (isset($_SESSION['loginUsername'])) {
									// check permission if login account is client
									if ($_SESSION["permission"] == "host") {

								?>
										<li class="nav-item">
											<b><a class="nav-link" href="host_account_information.php">Welcome <?php echo $_SESSION['loginUsername']; ?></a></b>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="host-dashboard-booking.php">Booking management</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="host-dashboard-accommodation.php">Accommodation management</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="host-inbox.php">Inbox</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" id="logout">Logout</a>
										</li>
									<?php
									} else 
									if ($_SESSION["permission"] == "client") {
										// redirect to host page
										echo "<script>
										alert('Sorry! Your account is not allowed to access this website!');
										window.location.href='../index.php';
										</script>";
									} else 
									if ($_SESSION["permission"] == "system_manager") {
										// redirect to host page
										echo "<script>
										alert('Sorry! Your account is not allowed to access this website!');
										window.location.href='manager_dashboard/Manager_Dashboard_Home.php';
										</script>";
									}
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

            
    </body>
</html>