<?php
// connect database
include('session.php');
include('db_conn.php');

if($_POST['action'] == "booking_process"){
    $client_id = $_POST['client_id'];
    $accommodation_id = $_POST['accommodation_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $number_of_guests = $_POST['number_of_guests'];
    $total_price = $_POST['total_price'];
    $booking_status = $_POST['booking_status'];
    // query for insert booking record to database.
    $query = "INSERT INTO booking(client_id, accommodation_id, start_date, end_date, number_of_guests, booking_status, total_price) VALUES ('$client_id', '$accommodation_id', '$start_date', '$end_date', '$number_of_guests', '$booking_status', '$total_price')";
    // append start date and end date to accommodation table -> in order to make search function when client search accommodation to booking.
    $booking_date = $start_date .'~'. $end_date .';';
    $query_booking_date = "UPDATE accommodation SET booking_date=CONCAT(ifnull(booking_date,''),'$booking_date') WHERE accommodation_id='$accommodation_id'";
    if ($conn->query($query) && $conn->query($query_booking_date)) {
        //if insert success
        echo 'success';
    } else {
        //if insert fail
        echo 'fail';
    }
} else 
if($_POST['action'] == "check_login") {
    //check
    if(!isset($_SESSION['loginUsername'])){
        echo "need_login";
    }else{
        echo "loged_in";
    }

} else {
    echo "action not found!";
}


?>