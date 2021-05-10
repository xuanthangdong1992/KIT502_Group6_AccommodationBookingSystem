<?php
include('../db_conn.php');
session_start();

$id = $_GET['id'];
$action = $_GET['action'];


if ($action == "cancel") {
    // prepare and bind
    $stmt = $conn->prepare("UPDATE booking SET booking_status='canceled' WHERE booking_id='$id'");


    $_SESSION['msg'] = "User Updated Succesfully";
    header('location:Manager_Dashboard_User.php');
}
