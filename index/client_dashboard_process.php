<?php
include('session.php');
include('db_conn.php');

if($_POST['action'] == "cancel_confirm"){
    $cancle_result = addslashes($_POST['cancle_result']);
    $booking_id = addslashes($_POST['booking_id']);
    if($cancle_result == 'true'){
        $query = "UPDATE booking SET booking_status = 'cancel' WHERE booking_id = '$booking_id'";
        if ($conn->query($query) === TRUE) {
            echo "success";
          } else {
            echo "fail";
          }
    }
} else
if($_POST['action'] == "payment_process"){

    $client_id = addslashes($_POST['client_id']);
    $booking_id = addslashes($_POST['booking_id']);
    $total_price = addslashes($_POST['total_price']);
    $payment_status = addslashes($_POST['payment_status']);
    $card_holder = addslashes($_POST['card_holder']);
    $card_number = addslashes($_POST['card_number']);
    $expiry_date = addslashes($_POST['expiry_date']);
    $security_code = addslashes($_POST['security_code']);
    //encrypt security code
    $security_code = crypt($security_code, "group6");
    //change booking status
    $queryChangeBookingStatus = "UPDATE booking SET booking_status = 'completed' WHERE booking_id = '$booking_id'";
    $queryInsertPayment = "INSERT INTO payment (client_id, booking_id, total_price, payment_status, card_holder, card_number, expiry_date, security_code) VALUES ('$client_id', '$booking_id', '$total_price', '$payment_status', '$card_holder', '$card_number', '$expiry_date', '$security_code')";
        if (($conn->query($queryChangeBookingStatus) === TRUE) && ($conn->query($queryInsertPayment) === TRUE)) {
            echo "success";
          } else {
            echo "fail";
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        // echo $queryInsertPayment;
} else
//Delete review
if($_POST['action'] == "delete_review"){
  $review_id = addslashes($_POST['review_id']);
  $queryReview = "DELETE FROM accommodation_review WHERE accommodation_review_id='$review_id'";
  if ($conn->query($queryReview) === TRUE){
    echo "success";
  }else{
    echo "fail";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else

//edit review
if($_POST['action'] == "edit_review"){
  $review_id = addslashes($_POST['review_id']);
  $rate = addslashes($_POST['rate']);
  $comment = addslashes($_POST['comment']);
  $queryEditReview = "UPDATE accommodation_review SET rate = '$rate', comment = '$comment' WHERE accommodation_review_id ='$review_id'";
  // echo $queryEditReview;
  if ($conn->query($queryEditReview) === TRUE){
    echo "success";
  }else{
    echo "fail";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else{
  echo "action not found!";
}

?>