<?php
include('session.php');
include('db_conn.php');

$client_id = addslashes($_POST['client_id']);
$accommodation_id = addslashes($_POST['accommodation_id']);
$rate = addslashes($_POST['rate']);
$comment = addslashes($_POST['comment']);
$queryInsertReview = "INSERT INTO accommodation_review(accommodation_id, client_id, rate, comment) VALUES ('$accommodation_id', '$client_id', '$rate', '$comment')";
if ($conn->query($queryInsertReview) === TRUE){
    echo "success";
  }else{
    echo "fail";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
