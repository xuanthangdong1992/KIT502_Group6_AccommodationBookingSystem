<?php
include('../session.php');
include('../db_conn.php');
//delete house
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
  //add house
  if($_POST['action'] == "add_house"){
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
      $img_source = addslashes($_POST['img_source']);
      $host_id = addslashes($_POST['host_id']);
  
      $query = "INSERT INTO `accommodation`(`house_name`, `description`, `price`, `number_of_room`, `number_of_bathroom`, `smoke_allowed`, `garage`, `pet_friendly`, `internet_provided`, `check_in_time`, `check_out_time`, `address`, `city`, `postal_code`, `state`, `max_guests_allowed`, `image`, `host_id`) 
      VALUES ('$house_name','$description','$price','$number_of_room','$number_of_bathroom','$smoke_allowed','$garage','$pet_friendly','$internet_provided','$check_in_time','$check_out_time','$address','$city','$postal_code','$state','$max_guests_allowed','$img_source','$host_id')";
      if ($conn->query($query)) {
          echo 'success';
      } else {
          echo 'fail';
      }
  } else{
    echo "action not found!";
  }
  

?>