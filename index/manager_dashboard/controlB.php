<!-- This is the controler of function-cancel booking -->
<?php
include('../db_conn.php');
session_start();

$id = $_GET['id'];
$action = $_GET['action'];

if ($action == "cancel") {
       $conn->query("UPDATE booking SET booking_status='canceled' WHERE booking_id='$id'");


    $_SESSION['msg'] = "Bokking Canceled Succesfully";
    header('location:Manager_Dashboard_booking.php');
}
