<?php
include('../session.php');
include('../db_conn.php');
// This is controller for booking management action
if($_POST['action'] == "delete_review"){
    $review_id = addslashes($_POST['review_id']);
    $query = "DELETE FROM accommodation_review WHERE accommodation_review_id='$review_id'";
    if ($conn->query($query) === TRUE){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "action not found!";
}
?>
