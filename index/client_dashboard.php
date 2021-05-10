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
    <!-- Css data table paging -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
</head>
<body>
	<!-- jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<!-- support call ajax -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- Data table paging -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>


	<div class="form-bg">
		<div class="main-page">
			<?php
				include ('header.php');
            ?>
           
    <!-- Data table paging -->
    <table id="booking_table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Accommodation ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of Guests</th>
                <th>Booking status</th>
                <th width="130px">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                //Get booking data from database
                $client_id = $_SESSION["loginUsername"];
                $booking_query = "SELECT * FROM booking WHERE client_id = '$client_id'";
                $booking_list_result = mysqli_query($conn, $booking_query);
                foreach($booking_list_result as $booking){
			?>
            <tr>
                <td><?php echo $booking['booking_id']; ?></td>
                <td><?php echo $booking['accommodation_id']; ?></td>
                <td><?php echo $booking['start_date']; ?></td>
                <td><?php echo $booking['end_date']; ?></td>
                <td><?php echo $booking['number_of_guests']; ?></td>
                <?php
                    if($booking['booking_status'] == "pending"){
                ?>
                <td><?php echo $booking['booking_status']; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" name="btn_cancel" id="btn_cancel">Cancel</button>
                </td>
                <?php } else
                    if($booking['booking_status'] == "confirmed"){
                ?>
                <td><?php echo $booking['booking_status']; ?></td>
                <td><div class="btn-group">
                    <button type="button" class="inner btn btn-primary" name="btn_pay" id="btn_pay">Payment</button>
                    <button type="button" class="inner btn btn-danger" name="btn_cancel" id="btn_cancel">Cancel</button>
                </div></td>
                <?php
                    } else
                    if($booking['booking_status'] == "rejected"){
                ?>
                <td><?php echo $booking['booking_status']; ?></td>
                <td><button type="button" class="btn btn-warning" name="btn_reject_reason" id="btn_reject_reason">Reason reject</button></td>
                <?php
                    // if booking status == canceled
                    } else {  
                ?>
                <td><?php echo $booking['booking_status']; ?></td>
                <td></td>
                <?php
                    }
                ?>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>



        </div>
    </div>

    <script type="text/javascript">
            //data table process
            $(document).ready(function() {
                $('#booking_table').DataTable();
            } );
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
                            //when client logout this will redirect to home page.
							location.href="index.php";
						}
					});
				});

			});

    </script>
</body>
</html>