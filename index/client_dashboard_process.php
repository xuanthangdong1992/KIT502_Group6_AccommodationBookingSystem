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
}

?>