<?php
include('../db_conn.php');
include('../session.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Host Dashboard</title>
    <!-- Local CSS file -->
	<link href="../../css/clientstyle.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">  

</head>

<body>
    <!-- Data table paging -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <div class="management-nav">
    <?php
				include ('host_header.php');
			?>          
    </div>

    
<div class="main_container">
<div class="card card-body">
        <h3>Manage Booking Request </h3>
</div>
<!-- Data table paging -->
<div class="table-responsive">
    <table id="booking_table" class="table table-info table-bordered nowrap" style="width: 100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Accommodation ID</th>
                <th>House</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Guests</th>
                <th>Total Price</th>
                <th>Booking Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                //Get booking data from database
                $host_id = $_SESSION["loginUsername"];
                $booking_query = "SELECT booking.booking_id, booking.total_price, booking.accommodation_id, accommodation.house_name, booking.start_date, booking.end_date, booking.number_of_guests, booking.booking_status, booking.rejected_reason FROM booking LEFT JOIN accommodation ON booking.accommodation_id=accommodation.accommodation_id WHERE accommodation.host_id='$host_id'";
                $booking_list_result = mysqli_query($conn, $booking_query);
                if (is_array($booking_list_result) || is_object($booking_list_result)){
                foreach($booking_list_result as $booking){
			?>
            <tr>
                <td><?php echo $booking['booking_id']; ?></td>
                <td><?php echo $booking['accommodation_id']; ?></td>
                <td><?php echo $booking['house_name']; ?></td>
                <td><?php echo date_format(date_create($booking['start_date']), "d/m/Y"); ?></td>
                <td><?php echo date_format(date_create($booking['end_date']), "d/m/Y"); ?></td>
                <td><?php echo $booking['number_of_guests']; ?></td>
                <td><?php echo $booking['total_price']; ?></td>
                <td><?php echo $booking['booking_status']; ?></td>
                <?php
                    if($booking['booking_status'] == "pending"){
                ?>
                <td>
                    <button type="button" class="btn btn-primary" name="btn_cancel" id="btn_cancel" onclick="acceptBooking('<?php echo $booking['booking_id'] ?>')">Accept</button>
                    <button type="button" class="btn btn-danger" name="btn_cancel" id="btn_cancel" onclick="rejectBooking('<?php echo $booking['booking_id'] ?>')">Reject</button>
                </td>
                <?php 
                } else 
                if($booking['booking_status'] == "rejected"){
                    ?>
                <td><button type="button" class="btn btn-warning" name="reason_details" id="reason_details" onclick="rejectedReason('<?php echo $booking['rejected_reason'] ?>')">Reason details</button></td>
                    <?php
                }else{
                    ?>
                <td></td>
                    <?php
                }
                ?>
            </tr>
            <?php
            }
        }
            ?>
        </tbody>
    </table>
</div>
</div>
    <!-- Display reason rejected modal -->
    <div class="modal fade" id="rejectedReasonModal" tabindex="-1" role="dialog" aria-labelledby="rejectedReasonModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- login form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Reason why the host rejected</h3>
						<div class="form-group required">
							<br><label id="rejectedReasonContent">not found reason!</lable>
						</div>
				</div>
			</div>
		</div>
	</div>

<!-- Reject booking Modal -->
<div class="modal fade" id="rejectBookingModal" tabindex="-1" role="dialog" aria-labelledby="rejectBookingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- payment form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Reject Booking</h3>

                        <div class="form-group">
                            <label for="comment">Leave a reason for client to explain why you reject this booking: </label>
                            <textarea class="form-control" id="reason_content" name="reason_content" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg btn-block" name="btn_reject_booking" id="btn_reject_booking">Submit</button>
						</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
            //data table process
            $(document).ready(function() {
                $('#booking_table').DataTable(
                    {
                        "scrollY":        "550px",
                        "scrollCollapse": true,
                        "paging":         false
                    }
                );
            } );

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
        //accepted
        function acceptBooking(booking_id){
            var r = confirm("Do you want to accept this booking?");
            if (r == true) {
                $.ajax({
						url: "host_dashboard_booking_process.php",
						method: "POST",
						data: {
                            booking_id: booking_id,
                            action: "accept_booking"
						},
						success: function(data) {
                            if (data == "success"){
                                alert("Accepted this booking!");
                                location.reload();
                            }
						}
					});
            } else {
                
            } 
        }
        //rejected
        function rejectBooking(booking_id){
            $("#rejectBookingModal").modal();
            $("#btn_reject_booking").click(function() {
                var reason_content = $('#reason_content').val();
                $.ajax({
                url: "host_dashboard_booking_process.php",
                method: "POST",
                data: {
                    booking_id: booking_id,
                    reason_content: reason_content,
                    action: "reject_booking"
                },
                success: function(data) {
                    if (data == "success"){
                        alert("Reject booking success!");
                        location.reload();
                    }
                }
                });
            });

        }
        //reason rejected details
        function rejectedReason(reason){
            $("#rejectedReasonContent").html(reason);
            $("#rejectedReasonModal").modal();
        }
    </script>
</body>
</html>