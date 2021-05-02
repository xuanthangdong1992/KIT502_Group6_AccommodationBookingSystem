<?php
    include('db_conn.php');
    session_start();

	$id=$_GET['id'];

	$conn->query("delete from accommodation where accommodation_id='$id'");


	$_SESSION['msg']="Accommodation Deleted Succesfully";
	header('location:host-dashboard-accommodation.php');
?>