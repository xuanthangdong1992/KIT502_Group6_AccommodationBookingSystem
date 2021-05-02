<?php
	include('db_conn.php');
	session_start();

	$id=$_GET['id'];
	
//$clientid=$_POST['client_id'];
//$accid=$_POST['accommodation_id'];
//$start=$_POST['start_date'];
//$end=$_POST['end_date'];
//$guests=$_POST['number_of_guests'];
$status=$_POST['booking_status'];

$conn->query("update booking set booking_status='$status' ");

//where booking_id='$id' is not working
	
header('location:host-dashboard-booking.php');

?>