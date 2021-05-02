<?php
include('db_conn.php');
session_start();

$id=$_GET['id'];

$clientid=$_POST['client_id'];
$accid=$_POST['accommodation_id'];
//$start=$_POST['start_date'];
//$end=$_POST['end_date'];
$guests=$_POST['number_of_guests'];
$status=$_POST['booking_status'];

//$conn->query("insert into booking (client_id, accommodation_id, start_date, end_date, number_of_guests, booking_status) 
//values ('$clientid', '$accid', '$start', '$end', '$guests', '$status')");

$conn->query("insert into booking (client_id, accommodation_id, number_of_guests, booking_status) 
values ('$clientid', '$accid', '$guests','$status')");

header('location:host-dashboard-booking.php');
?>