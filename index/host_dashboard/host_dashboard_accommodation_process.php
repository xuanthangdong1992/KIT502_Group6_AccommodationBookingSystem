<?php
include('../session.php');
include('../db_conn.php');
if($_POST['action'] == "delete_house"){
    $house_id = addslashes($_POST['house_id']);
    $query = "DELETE FROM accommodation WHERE accommodation_id='$house_id'";
    if ($conn->query($query) === TRUE){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else{
    echo "action not found!";
  }
  

?>