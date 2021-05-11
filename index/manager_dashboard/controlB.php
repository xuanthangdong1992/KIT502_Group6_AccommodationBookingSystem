<?php
include('../session.php');
include('../db_conn.php');
// This is controller for booking management action
if($_POST['action'] == "cancel_booking"){
    $booking_id = addslashes($_POST['booking_id']);
    $query = "UPDATE `booking` SET `booking_status`='cancel' WHERE booking_id='$booking_id'";
    if ($conn->query($query)){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "action not found!";
  }

?>
