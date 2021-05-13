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
    <title>Manager Dashboard-Booking</title>
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
        include('manager_header.php');
        ?>
    </div>


    <div class="main_container">
        <div class="card card-body">
            <h3>Booking Management </h3>
        </div>
        <!-- Data table paging -->
        <div class="table-responsive">
            <table id="booking_table" class="table table-info table-bordered nowrap" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Accommodation ID</th>
                        <th>Client</th>
                        <th>Host</th>
                        <th>House</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Guests</th>
                        <th>Payment Status</th>
                        <th>Booking Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Get booking data from database
                    $admin_id = $_SESSION["loginUsername"];
                    $booking_query = "SELECT booking.booking_id, booking.accommodation_id, booking.client_id, accommodation.host_id, accommodation.house_name, booking.start_date, booking.end_date, booking.number_of_guests, booking.booking_status, booking.rejected_reason, payment.payment_status FROM booking LEFT JOIN accommodation ON booking.accommodation_id=accommodation.accommodation_id LEFT JOIN payment ON booking.booking_id=payment.booking_id";
                    $booking_list_result = mysqli_query($conn, $booking_query);
                    if (is_array($booking_list_result) || is_object($booking_list_result)) {
                        foreach ($booking_list_result as $booking) {
                    ?>
                            <tr>
                                <td><?php echo $booking['booking_id']; ?></td>
                                <td><a href="manager_accommodation_details.php?id=<?php echo $booking['accommodation_id']; ?>"><?php echo $booking['accommodation_id']; ?> (Click for more details)</a></td>
                                <td>
                                    <?php echo $booking['client_id']; ?>
                                    <button type="button" class="btn btn-primary" onclick="showChatBox('<?php echo $admin_id; ?>', '<?php echo $booking['client_id']?>')">Chat</button>
                                </td>
                                <td>
                                    <?php echo $booking['host_id']; ?>
                                    <button type="button" class="btn btn-primary" onclick="showChatBox('<?php echo $admin_id; ?>', '<?php echo $booking['host_id']?>')">Chat</button>
                                </td>
                                <td><?php echo $booking['house_name']; ?></td>
                                <td><?php echo date_format(date_create($booking['start_date']), "d/m/Y"); ?></td>
                                <td><?php echo date_format(date_create($booking['end_date']), "d/m/Y"); ?></td>
                                <td><?php echo $booking['number_of_guests']; ?></td>
                                <td><?php echo $booking['payment_status']; ?></td>
                                <td><?php echo $booking['booking_status']; ?></td>
                                <?php
                                if ($booking['booking_status'] == "pending" || $booking['booking_status'] == "confirmed") {
                                ?>
                                    <td>
                                        <button type="button" class="btn btn-danger" name="btn_cancel" id="btn_cancel" onclick="cancelBooking('<?php echo $booking['booking_id'] ?>')">Cancel</button>
                                    </td>
                                <?php
                                } else 
                if ($booking['booking_status'] == "rejected") {
                                ?>
                                    <td><button type="button" class="btn btn-warning" name="reason_details" id="reason_details" onclick="rejectedReason('<?php echo $booking['rejected_reason'] ?>')">Reason details</button></td>
                                <?php
                                } else {
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

    <!-- Chat Modal  -->
    <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="mes_container">
                <div class="modal-body" id="message_content_box">
                </div>
                <div class="modal-footer">
                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Type message.." name="input_mes" id="input_mes" rows="1"></textarea>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" name="btn_send_mes" id="btn_send_mes" onclick="sendMessage('<?php echo $admin_id; ?>')">Send</button>
                        </div>
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
            $('#booking_table').DataTable({
                "scrollY": "550px",
                "scrollCollapse": true,
                "paging": false
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
                        location.href = "../index.php";
                    }
                });
            });

        });

        //cancel booking with 2 case: when booking status are pending and confirmed
        function cancelBooking(booking_id) {
            var r = confirm("Do you really want to cancel this booking? This action can not redo.");
            if (r == true) {
                $.ajax({
                    url: "controlB.php",
                    method: "POST",
                    data: {
                        booking_id: booking_id,
                        action: "cancel_booking"
                    },
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        }
                    }
                });
            } else {

            }

        }
        //reason rejected details
        function rejectedReason(reason) {
            $("#rejectedReasonContent").html(reason);
            $("#rejectedReasonModal").modal();
        }

         // show chatbox function  
         function showChatBox(host_id, receiver_id) {
            $("#chatModal").modal();
            $.ajax({
                url: "host_inbox_process.php",
                method: "POST",
                data: {
                    host_id: host_id,
                    receiver_id: receiver_id,
                    action: "show_messages"
                },
                success: function(data) {
                    $('#message_content_box').html(data);

                }
            });
        }

        //send message
        function sendMessage(host_id) {
            var mes_content = $('#input_mes').val();
            var contact_id = $('#get_receiver_id').val();
            if (mes_content != "") {
                $.ajax({
                    url: "host_inbox_process.php",
                    method: "POST",
                    data: {
                        host_id: host_id,
                        contact_id: contact_id,
                        mes_content: mes_content,
                        action: "insert_message"
                    },
                    success: function(data) {

                        $('#message_content_box').append(data);
                    }
                });
            }
        }
    </script>
</body>

</html>