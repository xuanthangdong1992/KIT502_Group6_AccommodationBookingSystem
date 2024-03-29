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
    <title>Accommodation Booking System - Group 6</title>
	<!-- Local CSS file -->
	<link rel="stylesheet" href="../css/clientstyle.css">
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





	<div class="form-bg">
		<div class="main-page">
			<?php
				        include ('header.php');
            ?>
    <!-- Data table paging -->
    <div class="table-responsive">
    <table id="booking_table" class="table table-dark table-bordered nowrap" style="width: 100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Accommodation ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Max Guests</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                // check user loged in or not.
                if(!isset($_SESSION["loginUsername"])){
                    //redirect to index page
                    header('Location: index.php');
                }
                //Get booking data from database
                $client_id = $_SESSION["loginUsername"];
                $booking_query = "SELECT * FROM booking WHERE client_id = '$client_id'";
                $booking_list_result = mysqli_query($conn, $booking_query);
                if (is_array($booking_list_result) || is_object($booking_list_result)){
                foreach($booking_list_result as $booking){
			?>
            <tr>
                <td><?php echo $booking['booking_id']; ?></td>
                <td><a href="accommodation-details.php?id=<?php echo $booking['accommodation_id']; ?>"><?php echo $booking['accommodation_id']; ?> - More details</a></td>
                <td><?php echo date_format(date_create($booking['start_date']), "d/m/Y"); ?></td>
                <td><?php echo date_format(date_create($booking['end_date']), "d/m/Y"); ?></td>
                <td><?php echo $booking['number_of_guests']; ?></td>
                <td><?php echo $booking['total_price']; ?></td>
                <?php
                    if($booking['booking_status'] == "pending"){
                ?>
                <td id="booking_status"><?php echo $booking['booking_status']; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" name="btn_cancel" id="btn_cancel" onclick="cancelConfirm('<?php echo $booking['booking_id'] ?>')">Cancel</button>
                </td>
                <?php } else
                    if($booking['booking_status'] == "confirmed"){
                ?>
                <td id="booking_status"><?php echo $booking['booking_status']; ?></td>
                <td><div class="btn-group">
                    <button type="button" class="inner btn btn-primary" name="btn_pay" id="btn_pay" onclick="paymentProcess('<?php echo $booking['booking_id'] ?>', '<?php echo $client_id ?>', '<?php echo $booking['total_price'] ?>')">Payment</button>
                </div></td>
                <?php
                    } else
                    if($booking['booking_status'] == "rejected"){
                ?>
                <td id="booking_status"><?php echo $booking['booking_status']; ?></td>
                <td><button type="button" class="btn btn-warning" name="btn_reject_reason" id="btn_reject_reason" onclick="rejectedReason('<?php echo $booking['rejected_reason'] ?>')">Reason reject</button></td>
                <?php
                    // if booking status == canceled or booking status == completed
                    } else {  
                ?>
                <td id="booking_status"><?php echo $booking['booking_status']; ?></td>
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


<!-- Display payment modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- payment form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Payment</h3>
                    <form id="payForm" action="client_dashboard_process.php" method="post">
                        <div class="form-group required">
							<label class="label-control">Card Holder:</label>
							<input class="form-control" type="text" id="cardholder" name="cardholder" required/>
						</div>
						<div class="form-group required">
							<label class="label-control">Card Number:</label>
							<input class="form-control" type="text" id="cardnumber" name="cardnumber" required/>
						</div>
                        <div class="form-row">
                            <div class="form-group required col-md-8">
                                <label class="label-control">Expiry date (MM/YY):</label>
                                <input class="form-control" type="text" id="expirydate" name="expirydate" required/>
                            </div>
                            <div class="form-group required col-md-4">
                                <label class="label-control">Security Code:</label>
                                <input class="form-control" type="password" id="securitycode" name="securitycode" required/>
                            </div>
                        </div>
                        <div class="form-group required">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="pay_button" id="pay_button" >Pay</button>
						</div>
                        </form>
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

        // cancel confirm
        function cancelConfirm(params){
            var table = $('#booking_table').DataTable();
            var r = confirm("Do you really want to cancel this booking?");
            var booking_id = params;
            if (r == true) {
                // edit status to cancel
                $.ajax({
						url: "client_dashboard_process.php",
						method: "POST",
						data: {
							cancle_result: "true",
                            booking_id: booking_id,
                            action: "cancel_confirm"
						},
						success: function(data) {
                            if (data == "success"){
                                location.reload();
                            }
						}
					});
            } else {
                
            } 
        }


        function rejectedReason(params){
            $("#rejectedReasonContent").html(params);
            $("#rejectedReasonModal").modal();
        }

        //click button pay on datatable.
        function paymentProcess(booking_id, client_id, total_price){
            $("#paymentModal").modal();
            //validate form
            $("#pay_button").click(function() {
                var card_holder = $('#cardholder').val();
                var card_number = $('#cardnumber').val();
                var expiry_date = $('#expirydate').val();
                var security_code = $('#securitycode').val(); 
                //validate form
                if((card_holder=="" || card_number=="") || (expiry_date=="" || security_code=="")){
                    // alert("Please fill up card information");
                }else {
                $.ajax({

						url: "client_dashboard_process.php",
						method: "POST",
						data: {
                            client_id: client_id,
                            booking_id: booking_id,
                            total_price: total_price,
                            //not access any payment tracsaction -> fix payment status: completed
                            payment_status: "completed",
                            card_holder: card_holder,
                            card_number: card_number,
                            expiry_date: expiry_date,
                            security_code: security_code,
                            action: "payment_process"
						},
						success: function(data) {
                            alert(data);
                            if (data == "success"){
                                alert("Payment success!");
                                location.reload();
                            }
						}
					});
                }
                });
        }
    </script>
</body>
</html>