<!DOCTYPE html>
<?php
include('../db_conn.php');
include('../session.php');
?>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Host Dashboard</title>
    
    <!-- Local CSS   -->
    <link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/clientstyle.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- Bootstrap   -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <div class="management-nav">
    <?php
				include ('host_header.php');
			?>          
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

		<script type="text/javascript">

		//logout process
		$(document).ready(function() {
				$('#logout').click(function() {
					var logout = "logout";
					$.ajax({
						url: "../login_process.php",
						method: "POST",
						data: {
							logout: logout
						},
						success: function() {
							location.href = "../index.php";						
                        }
					});
				});

			});
		</script>
        
    </body>
</html>