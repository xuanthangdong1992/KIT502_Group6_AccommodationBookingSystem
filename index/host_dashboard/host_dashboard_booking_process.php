<?php
include('../session.php');
include('../db_conn.php');
// accept booking
if($_POST['action'] == "accept_booking"){
    $booking_id = addslashes($_POST['booking_id']);
        $query = "UPDATE booking SET booking_status = 'confirmed' WHERE booking_id = '$booking_id'";
        if ($conn->query($query) === TRUE) {
            echo "success";
          } else {
            echo "fail";
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
} else
// reject booking
if($_POST['action'] == "reject_booking"){
    $booking_id = addslashes($_POST['booking_id']);
    $reason_content = addslashes($_POST['reason_content']);
        $query = "UPDATE booking SET rejected_reason = '$reason_content', booking_status = 'rejected' WHERE booking_id = '$booking_id'";
        if ($conn->query($query) === TRUE) {
            echo "success";
          } else {
            echo "fail";
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
} else {
  echo "action not found!";
}

?>