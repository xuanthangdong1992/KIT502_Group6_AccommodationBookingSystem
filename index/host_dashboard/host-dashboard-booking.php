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
    
    <!-- Local CSS   -->
    <link href="../../css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/clientstyle.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
     <!-- Local JS file -->
    <script src="../../js/manageuser.js"></script>
    <script src="../../js/manageAccommodation.js"></script>
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

    



    <!-- Topbar for search accomodation -->
    <div class="Topbar">
        <div class="card card-body">
            <div class="col-md-4">
                <!-- for searching accomodations -->
                <form>
                    <input type="text" class="form-control product-search" id="input-search" placeholder="Search Accomodation">
                </form>                    
            </div>
        </div>
    </div>

<!--title-->
<div class="card card-body">
        <h3>Manage Booking Request </h3>
</div>

    <!--This is the table of all the accomodations-->
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table table-striped search-table v-middle">
                <!--This shows the attributes of accomodations-->
                <th class="text-dark font-weight-bold">Client ID</th>
                <th class="text-dark font-weight-bold">Acccommodation ID</th>
                <th class="text-dark font-weight-bold">Start date</th>
                <th class="text-dark font-weight-bold">End Date</th>
                <th class="text-dark font-weight-bold">Number of guests</th>
                <th class="text-dark font-weight-bold">Status</th>
                <th class="text-dark font-weight-bold">Decide</th>
            </thead>

            <tbody>
            <?php
                //query for selecting/retrieving every row from the table booking
				$query=$conn->query("SELECT * FROM `booking`");
                //query() function to execute the query in the database
                
                //-> fetch_array()to convert the result to array
                //MYSQLI_ASSOC to specify the type of the array produced
				while($row=$query->fetch_array(MYSQLI_ASSOC))
                {
	        ?>
                <!-- This is the information of booking 1-->
                <tr class="search-items">
                    <!-- This is the client id of booking 1-->
                    <td>
                        <span class="mb-0"><?php echo $row["client_id"]; ?></span>
                    </td>
                    <!-- This is the accommodation id of booking 1-->
                    <td>
                        <span class="mb-0"><?php echo $row["accommodation_id"]; ?></span>
                    </td>
                    <!-- This is the start date of booking 1-->
                    <td>
                        <span class="mb-0"><?php echo date_format(date_create($row['start_date']), "d/m/Y"); ?></span>
                    </td>
                    <!-- This is the end date of booking 1 -->
                    <td>
                        <span class="mb-0"><?php echo date_format(date_create($row['end_date']), "d/m/Y"); ?></span>          
                    </td>
                    <!-- This is the number of guests of booking 1-->
                    <td>
                        <span class="mb-0"><?php echo $row["number_of_guests"]; ?></span>
                    </td>
                    <!-- This is the status of booking 1-->
                    <td>
                        <span class="mb-0"><?php echo $row["booking_status"]; ?></span>
                    </td>
                    <!--This is the function for edit and delete Accommodation1-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="#changeStatus" name="update" data-toggle="modal" data-target="#changeStatus" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                        </div>
                    </td>
                </tr>

            <?php } ?> 
            </tbody>
        </table>
    </div>
</div>

<!-- change Status Modal -->
<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- change status form -->
                <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h1>Change status</h1>
                <!--form action-->
                <form id="changeStatusForm" action="bookingupdate_conn.php?" method="post">     
                    <div class="form-group">
                        <label>Number of guests</label>
                        <select class="form-control" id="booking_status_u" name="booking_status">
                            <option value="pending">pending</option>
                            <option value="confirmed">confirmed</option>
                            <option value="canceled">canceled</option>
                            <option value="rejected">rejected</option>
                        </select>
                    </div>
                    <div id="reasonReject" class="form-group required">
                        <label class="label-control">Give the reason for reject decision:</label>
                        <textarea rows="5" class="form-control" type="text" id="reason" name="rejected_reason"></textarea>
                    </div>

                    <div class="submit-button">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End change Status Modal -->

<script type="text/javascript">
        // hide and show reason when user click to rejected status.
        $(document).ready(function() {
            $("#reasonReject").hide();
            $(".form-control").change(function() {
                if (this.value == 'rejected') {
                    $("#reasonReject").show();
                }
                else if (this.value == 'pending' || this.value == 'confirmed' || this.value == 'canceled') {
                    $("#reasonReject").hide();
                }
            });
        });

        // validate change status form
        $(document).ready(function() {
            $('form[id="changeStatusForm"]').validate({
                rules: {
                    reason: 'required',
                },
                messages: {
                    reason: '<span class="error">This field is required</span>',
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

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
							location.href = "../index.php";						}
					});
				});

			});
    </script>
</body>
</html>





















