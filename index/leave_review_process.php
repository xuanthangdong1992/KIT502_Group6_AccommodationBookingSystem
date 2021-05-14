<?php
include('session.php');
include('db_conn.php');

$client_id = addslashes($_POST['client_id']);
$accommodation_id = addslashes($_POST['accommodation_id']);
$rate = addslashes($_POST['rate']);
$comment = addslashes($_POST['comment']);
$queryInsertReview = "INSERT INTO accommodation_review(accommodation_id, client_id, rate, comment) VALUES ('$accommodation_id', '$client_id', '$rate', '$comment')";


if ($conn->query($queryInsertReview) === TRUE){
      //update average review for accommodation
      $quey_update_avg_review="";
      $query_avg="SELECT AVG(rate) as avg_rate FROM accommodation_review WHERE accommodation_review.accommodation_id = '$accommodation_id'";
      $result_avg = mysqli_query($conn, $query_avg);
        if (is_array($result_avg) || is_object($result_avg)){
                foreach($result_avg as $row){
                  $avg_rate = $row['avg_rate'];
                  $quey_update_avg_review = "UPDATE `accommodation` SET `accommodation_rate`='$avg_rate' WHERE `accommodation_id`='$accommodation_id'";
                }
              }

    if($conn->query($quey_update_avg_review) === TRUE){
      echo "success";
    } else {
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }else{
    echo "fail";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
