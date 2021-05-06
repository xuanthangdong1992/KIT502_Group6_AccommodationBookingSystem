<?php
include('../db_conn.php');
include('../session.php');
//session_start();  
//if(!isset($_SESSION["user"]))
//{
// header("location:host-dashboard.php");
//}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>System Management Dashboard</title>
    <!-- This page plugin CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/clientstyle.css" rel="stylesheet">
</head>

<body>
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script src="../../js/manageuser.js"></script>
    <script src="../../js/manageAccommodation.js"></script>
    <!-- validation plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <div class="management-nav">

        <header>
            <!-- bootstrap navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-dark static-top">
                <div class="container">
                    <a href="host-dashboard.html">
                        <img class="logo" src="../../img/logo.png" alt="">
                    </a>
                    <h2 style="color: white">Welcome to booking management</h2>
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
                                <a class="nav-link" href="host-dashboard-accommodation.php">Accommodation management</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="host-client-review.php">Review</a>
                                </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="host-inbox.php">Inbox</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="">Logout</a>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- end bootstrap navigation bar -->
        </header>

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

<!--Add new booking button-->
<div class="card card-body">
    <div class="btn-create">
        <span class="pull-left">
        <a href="#addStatus" data-toggle="modal" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-plus"></span> Create new Booking</a></span>
    </div>
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
                        <span class="mb-0"><?php echo $row["start_date"]; ?></span>
                    </td>
                    <!-- This is the end date of booking 1 -->
                    <td>
                        <span class="mb-0"><?php echo $row["end_date"]; ?></span>
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

<!-- add Status Modal -->
<div class="modal fade" id="addStatus" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- change status form -->
                <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h1>Add new pending booking</h1>
                <!--form action-->
                <form id="addStatusForm" action="booking_conn.php" method="post">
                <div class="form-group">
                    <label>Client ID </label>
                    <input required="required" type="text" class="form-control" id="client_id" name="client_id">
                </div>
                <div class="form-group">
                    <label>Accommodation ID </label>
                    <input required="required" type="text" class="form-control" id="accommodation_id" name="accommodation_id">
                </div>    
                <div class="form-group">
                        <label>Check in time: </label>
                        <input required="required" type="time" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group">
                        <label>Check out time: </label>
                        <input required="required" type="time" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="form-group">
                    <label>Number of guests</label>
                    <input required="required" type="text" class="form-control" id="number_of_guests" name="number_of_guests">
                </div>
                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="booking_status" name="booking_status">
                            <option selected>pending</option>
                        </select>
                </div>
                <div class="submit-button">
                        <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End add Status Modal -->

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
                <form id="changeStatusForm" action="bookingupdate_conn.php" method="post">
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
                        <textarea rows="5" class="form-control" type="text" id="reason" name="reason"></textarea>
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
                if (this.value == 'reject') {
                    $("#reasonReject").show();
                }
                else if (this.value == 'pending' || this.value == 'confirmed' || this.value == 'cancel') {
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
    </script>



</body>
</html>





















