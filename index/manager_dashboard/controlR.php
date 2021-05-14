<?php
include('../session.php');
include('../db_conn.php');
// This is controller for booking management action
if($_POST['action'] == "delete_review"){
    $review_id = addslashes($_POST['review_id']);
    $accommodation_id = addslashes($_POST['accommodation_id']);
    $query = "DELETE FROM accommodation_review WHERE accommodation_review_id='$review_id'";
    if ($conn->query($query) === TRUE){
      //update review for accommodation
    $quey_update_avg_review="";
    $query_avg="SELECT AVG(rate) as avg_rate FROM accommodation_review WHERE accommodation_review.accommodation_id = '$accommodation_id'";
    $result_avg = mysqli_query($conn, $query_avg);
      if (is_array($result_avg) || is_object($result_avg)){
              foreach($result_avg as $row){
                $avg_rate = $row['avg_rate'];
                if($avg_rate==NULL){
                  $quey_update_avg_review = "UPDATE `accommodation` SET `accommodation_rate`='5' WHERE `accommodation_id`='$accommodation_id'";
                }else{
                $quey_update_avg_review = "UPDATE `accommodation` SET `accommodation_rate`='$avg_rate' WHERE `accommodation_id`='$accommodation_id'";
                }
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
}else{
    echo "action not found!";
}
?>
