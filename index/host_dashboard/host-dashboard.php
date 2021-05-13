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
    <div>
            <h3>Statistics Information</h3>
            <div class="form-group row">
            <?php
            $host_id = $_SESSION["loginUsername"];
            $query1 = "SELECT COUNT(accommodation_id) AS 'number' FROM accommodation WHERE host_id='$host_id'";
            $result1 = mysqli_query($conn, $query1);
            if (is_array($result1) || is_object($result1)) {
                foreach ($result1 as $row) {
            ?>
                <label class="col-sm-2 col-form-label"><b>Number of house:</b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']; ?></label>
            <?php
                }
            }
            $query2="SELECT COUNT(accommodation_review.accommodation_review_id) as number FROM accommodation_review LEFT JOIN accommodation ON accommodation.accommodation_id=accommodation_review.accommodation_id WHERE accommodation.host_id='$host_id'";
            $result2 = mysqli_query($conn, $query2);
            if (is_array($result2) || is_object($result2)) {
                foreach ($result2 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of reviews:</b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']; ?></label>
            <?php
                }
            }
            $query3="SELECT COUNT(booking.booking_id) as number FROM booking LEFT JOIN accommodation ON booking.accommodation_id=accommodation.accommodation_id WHERE accommodation.host_id='$host_id'";
            $result3 = mysqli_query($conn, $query3);
            if (is_array($result3) || is_object($result3)) {
                foreach ($result3 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Total of requests:</b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query4="SELECT COUNT(booking.booking_id) as number FROM booking LEFT JOIN accommodation ON booking.accommodation_id=accommodation.accommodation_id WHERE accommodation.host_id='$host_id' AND booking.booking_status='pending'";
            $result4 = mysqli_query($conn, $query4);
            if (is_array($result4) || is_object($result4)) {
                foreach ($result4 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of new request: </b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            ?>
                   
            </div>
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