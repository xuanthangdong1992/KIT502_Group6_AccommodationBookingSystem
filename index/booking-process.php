<?php
// connect database
include('session.php');
include('db_conn.php');

$client_id = $_POST['client_id'];
$accommodation_id = $_POST['accommodation_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$number_of_guests = $_POST['number_of_guests'];
$booking_status = $_POST['booking_status'];
// query for insert booking record to database.
$query = "INSERT INTO booking(client_id, accommodation_id, start_date, end_date, number_of_guests, booking_status) VALUES ('$client_id', '$accommodation_id', '$start_date', '$end_date', '$number_of_guests', '$booking_status')";
if ($conn->query($query)) {
    //if insert success
    echo 'success';
} else {
    //if insert fail
    echo 'fail';
}

?>