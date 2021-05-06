<?php
	include('../db_conn.php');
	session_start();

$id=$_GET['id'];
//$clientid=$_POST['client_id'];
//$accid=$_POST['accommodation_id'];
//$start=$_POST['start_date'];
//$end=$_POST['end_date'];
//$guests=$_POST['number_of_guests'];
$status=$_POST['booking_status'];
$rejectedreason=$_POST['rejected_reason'];

$conn->query("update booking set booking_status='$status', rejected_reason='$rejectedreason' ");
$conn->query("select * from `booking` where booking_id='$id' ");
//where booking_id='$id' is not working

header('location:host-dashboard-booking.php');

?>