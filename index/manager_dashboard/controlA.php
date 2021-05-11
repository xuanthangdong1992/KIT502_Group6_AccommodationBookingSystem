<?php
include('../session.php');
include('../db_conn.php');
// delete house
if($_POST['action'] == "delete_house"){
    $house_id = addslashes($_POST['house_id']);
    $query = "DELETE FROM accommodation WHERE accommodation_id='$house_id'";
    if ($conn->query($query) === TRUE){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else
  //edit house
  if($_POST['action'] == "edit_house"){
      $house_name = addslashes($_POST['house_name']);
      $description = addslashes($_POST['description']);
      $price = addslashes($_POST['price']);
      $number_of_room = addslashes($_POST['number_of_room']);
      $number_of_bathroom = addslashes($_POST['number_of_bathroom']);
      $smoke_allowed = addslashes($_POST['smoke_allowed']);
      $garage = addslashes($_POST['garage']);
      $pet_friendly = addslashes($_POST['pet_friendly']);
      $internet_provided = addslashes($_POST['internet_provided']);
      $check_in_time = addslashes($_POST['check_in_time']);
      $check_out_time = addslashes($_POST['check_out_time']);
      $address = addslashes($_POST['address']);
      $city = addslashes($_POST['city']);
      $postal_code = addslashes($_POST['postal_code']);
      $state = addslashes($_POST['state']);
      $max_guests_allowed = addslashes($_POST['max_guests_allowed']);
      $house_id = addslashes($_POST['house_id']);
      $query = "UPDATE `accommodation` SET `house_name`='$house_name',`description`='$description',`price`='$price',`number_of_room`='$number_of_room',`number_of_bathroom`='$number_of_bathroom',`smoke_allowed`='$smoke_allowed',`garage`='$garage',`pet_friendly`='$pet_friendly',`internet_provided`='$internet_provided',`check_in_time`='$check_in_time',`check_out_time`='$check_out_time',`address`='$address',`city`='$city',`postal_code`='$postal_code',`state`='$state',`max_guests_allowed`='$max_guests_allowed' WHERE `accommodation_id`='$house_id'";
      if ($conn->query($query)) {          
          echo 'success';
      } else {
          echo 'fail';
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  } else{
    echo "action not found!";
  }
?>