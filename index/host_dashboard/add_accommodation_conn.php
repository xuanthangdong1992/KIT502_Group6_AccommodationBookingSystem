<?php
include ('db_conn.php');
session_start();

// prepare and bind
$stmt = $conn->prepare("INSERT INTO accommodation (house_name, description, 
price, number_of_room, number_of_bathroom, smoke_allowed, pet_friendly,
check_in_time, check_out_time, address, city, postal_code, state, max_guests_allowed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssdiiiissssssi", $house,$description, $price, $room, $bathroom, $smoke, 
$pet, $checkin, $checkout, $address, $city, $postal, $state, 
$maxguests);

// set parameters and execute

//$id=$_POST['accommodation_id'];	
$house= $_POST['house_name'];
$description= $_POST['description'];
$price= $_POST['price'];
$room= $_POST['number_of_room']; 
$bathroom= $_POST['number_of_bathroom'];
$smoke= $_POST['smoke_allowed'];
//$garage= $_POST['garage'];
$pet= $_POST['pet_friendly'];
//$internet= $_POST['internet_provided'];
$checkin= $_POST['check_in_time'];
$checkout= $_POST['check_out_time'];
$address= $_POST['address'];
$city= $_POST['city'];
$postal= $_POST['postal_code'];
$state= $_POST['state'];
$maxguests= $_POST['max_guests_allowed'];
//$image= $_POST['image'];
//$rate= $_POST['accommodation_rate'];

$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();

$_SESSION['msg']="Accommodation Added Succesfully";
	header('location:host-dashboard-accommodation.php');

