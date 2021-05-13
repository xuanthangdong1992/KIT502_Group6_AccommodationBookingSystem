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
	<title>Manager Dashboard</title> 
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
				include ('manager_header.php');
			?>          
    </div>

    <div>
            <h3>Statistics Information</h3>
            <div class="form-group row">
            <?php
            $admin_id = $_SESSION["loginUsername"];
            $query1 = "SELECT COUNT(accommodation_id) AS 'number' FROM accommodation";
            $result1 = mysqli_query($conn, $query1);
            if (is_array($result1) || is_object($result1)) {
                foreach ($result1 as $row) {
            ?>
                <label class="col-sm-2 col-form-label"><b>Number of shared house:</b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']; ?></label>
            <?php
                }
            }
            $query2="SELECT COUNT(accommodation_review.accommodation_review_id) as number FROM accommodation_review";
            $result2 = mysqli_query($conn, $query2);
            if (is_array($result2) || is_object($result2)) {
                foreach ($result2 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of reviews:</b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']; ?></label>
            <?php
                }
            }
            $query3="SELECT COUNT(booking.booking_id) as number FROM booking";
            $result3 = mysqli_query($conn, $query3);
            if (is_array($result3) || is_object($result3)) {
                foreach ($result3 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Total of requests:</b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query4="SELECT COUNT(booking.booking_id) as number FROM booking WHERE booking.booking_status='pending'";
            $result4 = mysqli_query($conn, $query4);
            if (is_array($result4) || is_object($result4)) {
                foreach ($result4 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of new request: </b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query5="SELECT COUNT(account.user_id) as number FROM account WHERE account_status='active'";
            $result5 = mysqli_query($conn, $query5);
            if (is_array($result5) || is_object($result5)) {
                foreach ($result5 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of user: </b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query6="SELECT COUNT(account.user_id) as number FROM account WHERE account_type='host' AND account_status='active'";
            $result6 = mysqli_query($conn, $query6);
            if (is_array($result6) || is_object($result6)) {
                foreach ($result6 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of host: </b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query7="SELECT COUNT(account.user_id) as number FROM account WHERE account_type='client' AND account_status='active'";
            $result7 = mysqli_query($conn, $query7);
            if (is_array($result7) || is_object($result7)) {
                foreach ($result7 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of client: </b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query8="SELECT COUNT(payment.payment_id) as number FROM payment WHERE payment_status='pending'";
            $result8 = mysqli_query($conn, $query8);
            if (is_array($result8) || is_object($result8)) {
                foreach ($result8 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of Pending Payment: </b></label>
                <label class="col-sm-1 col-form-label"><?php echo $row['number']?></label>
            <?php
                }
            }
            $query9="SELECT COUNT(payment.payment_id) as number FROM payment WHERE payment_status='completed'";
            $result9 = mysqli_query($conn, $query9);
            if (is_array($result9) || is_object($result9)) {
                foreach ($result9 as $row) {

            ?>
                <label class="col-sm-2 col-form-label"><b>Number of Completed Payment: </b></label>
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
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" src="../../img/M1.png" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h3 class="font-normal">User Management</h3>
                    <!--When click on the button, the page will jump to User Management Dashboard-->
                    <a href="Manager_Dashboard_User.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">User Management</a>
                </div>
            </div>
        </div>
        <!-- This is a card to link to Accomdation Management Dashboard -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" src="../../img/M2.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h4 class="font-normal">Accomdation Management</h4>
                    <!--When click on the button, the page will jump to Accomdation Management Dashboard-->
                    <a href="Manager_Dashboard_Accommodation.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Manage Accommodations</a>
                </div>
            </div>
        </div>
        <!-- This is a card to link to Booking Management Dashboard -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" src="../../img/M3.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h4 class="font-normal">Booking Management</h4>
                    <!--When click on the button, the page will jump to Booking Management Dashboard-->
                    <a href="Manager_Dashboard_Booking.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Manage Bookings</a>
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