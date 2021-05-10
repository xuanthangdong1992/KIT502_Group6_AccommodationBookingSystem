<!DOCTYPE html>
<?php
// connect database
include('../db_conn.php');
?>

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
    <script src="../../js/manageAccommodation.js"></script>

    <div class="management-nav">

        <header>
            <!-- bootstrap navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-dark static-top">
                <div class="container">
                    <a href="Manager_Dashboard_Home.php">
                        <img class="logo" src="../../img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="Manager_Dashboard_Home.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Manager_Dashboard_User.php">User management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Manager_Dashboard_Accommodation.php">Accommodation management</a>
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

    <!--This is the table of all the bookings-->
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table table-striped search-table v-middle">
                <thead class="header-item">
                    <!--This shows the attributes of booking list-->
                    <th class="text-dark font-weight-bold">Booking ID</th>
                    <th class="text-dark font-weight-bold">Client ID</th>
                    <th class="text-dark font-weight-bold">Accommodation ID</th>
                    <th class="text-dark font-weight-bold">Check In</th>
                    <th class="text-dark font-weight-bold">Chech Out</th>
                    <th class="text-dark font-weight-bold">Payment Status</th>
                    <th class="text-dark font-weight-bold">Booking Status</th>
                </thead>

                <tbody>

                    <!-- This is the information of Accomdation-->
                    <?PHP
                    $sql = "SELECT * FROM booking";
                    $result = $conn->query($sql);
                    $check_n = 0;
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            
                            $check_n++;
                    ?>

                            <tr class="search-items">
                                
                                <!-- This is the Booking ID for each booking record-->
                                <td>
                                <span class="b_	booking_id mb-0" data_booking_id="<?php echo $row["booking_id"]; ?>"><?php echo $row["booking_id"]; ?></span>
                                </td>
                                <!-- This is the Client ID for the booking-->
                                <td>
                                    <span class="b_client_id mb-0" data_client_id="<?php echo $row["client_id"]; ?>"><?php echo $row["client_id"]; ?></span>
                                </td>
                                <!-- This is the Accommodation ID for the booking-->
                                <td>
                                    <span class="b_accommodation_id mb-0" data_accommodation_id="<?php echo $row["accommodation_id"]; ?>"><?php echo $row["accommodation_id"]; ?></span>
                                </td>
                                <!-- This is the Check in date-->
                                <td>
                                    <span class="b_start_date" data_start_date="<?php echo $row["start_date"]; ?>"><?php echo $row["start_date"]; ?></span>
                                </td>
                                <!-- This is the Check out date-->
                                <td>
                                    <span class="b_end_date" data_end_date="<?php echo $row["end_date"]; ?>"><?php echo $row["end_date"]; ?></span>
                                </td>
                                <!-- This is the Payment Status-->
                                <td>
                                    <span class="b_total_price" data_total_price="<?php echo $row["total_price"]; ?>"><?php echo $row["total_price"]; ?></span>
                                    <!-- <span class="b_payment_status" data_payment_status="<?php echo $row["payment_status"]; ?>"><?php echo $row["payment_status"]; ?></span> -->
                                </td>
                                <!-- This is the Booking Status-->
                                <td>
                                    <div class="booking_status">
                                        <span class="b_booking_status text-info" data_booking_status="<?php echo $row["booking_status"]; ?>"><?php echo $row["booking_status"]; ?></span>
                                        <!--This is the function for edit Accommodation-->
                                        <a href="#cancelBookingModal<?php echo $row['booking_id']; ?>" data-toggle="modal" class="text-info">
                                            <i class="fa fa-edit font-18"></i>
                                        </a>
                                    </div>      
                                </td>
                            </tr>

                            <!--Cancel modal start -->
                            <div id="cancelBookingModal<?php echo $row['booking_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Cancel Booking</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <p><?php echo "Booking Status: ".$row["booking_status"]; ?></p>
                                                        <p><?php echo "Rejected Reason: ".$row["rejected_reason"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <a href="controlB.php?id=<?php echo $row['booking_id']; ?>&action=cancel" class="btn btn-danger">Cancel Booking</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <!-- Delete Modal End-->

                        <?php
                        }
                        ?>

                    <?PHP

                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>


                </tbody>
            </table>
        </div>
    </div>

</body>

</html>