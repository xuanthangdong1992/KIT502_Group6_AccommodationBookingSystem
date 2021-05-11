<?php
include('../session.php');
include('../db_conn.php');
// This is the controler of function-delete/add/edit user
// delete house
if($_POST['action'] == "delete_user"){
    $user_id = addslashes($_POST['user_id']);
    $query = "UPDATE `account` SET `account_status`='inactive' WHERE user_id='$user_id'";
    // echo $query;
    if ($conn->query($query)){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "action not found!";
  }


// var_dump($_POST);

// $id = $_GET['id'];
// $action = $_GET['action'];
// $abnNumber = "";

// if ($action == "delete") {
//     $conn->query("delete from account where user_id='$id'");


//     $_SESSION['msg'] = "User Deleted Succesfully";
//     header('location:Manager_Dashboard_User.php');

// } else if ($action == "add") {
//     // prepare and bind
//     $id = "user".rand(0, 999);

//     $stmt = $conn->prepare("INSERT INTO account (user_id, password, account_type, first_name, 
//     last_name, email, phone_number, postal_address, abn_number, account_rate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

//     $stmt->bind_param(
//         "ssssssssss",
//         $id,
//         $password,
//         $account_type,
//         $firstName,
//         $lastName,
//         $email,
//         $phoneNumber,
//         $postalAddress,
//         $abnNumber,
//         $accountRate,
//     );

//     // set parameters and execute
//     $account_type = $_POST['account_type'];
//     $password = $_POST['password'];
//     $firstName = $_POST['first_name'];
//     $lastName = $_POST['last_name'];
//     $email = $_POST['email'];
//     $phoneNumber = $_POST['phone_number'];
//     $postalAddress = $_POST['postal_address'];
//     $abnNumber = $_POST['abn_number'];
//     $accountRate = $_POST['account_rate'];

//     $stmt->execute();

//     echo "New user created successfully";

//     $stmt->close();
//     $conn->close();

//     $_SESSION['msg'] = "Accommodation Added Succesfully";
//     header('location:Manager_Dashboard_User.php');
// } else if ($action == "edit") {

//     // prepare and bind
//     $stmt = $conn->prepare("UPDATE account SET password=?, account_type=?, 
//     first_name=?, last_name=?, email=?, 
//     phone_number=?, postal_address=?,abn_number=?, 
//     account_rate=? WHERE user_id=?");

//     if ($stmt === false) {
//         trigger_error($conn->error, E_USER_ERROR);
//         return;
//     }


//     $stmt->bind_param(
//         "ssssssssds",
//         $password,
//         $account_type,
//         $firstName,
//         $lastName,
//         $email,
//         $phoneNumber,
//         $postalAddress,
//         $abnNumber,
//         $accountRate,
//         $id
//     );

//     // set parameters and execute

//     $password = $_POST['password'];
//     $account_type = "client";  // change   

//     $firstName = $_POST['first_name'];
//     $lastName = $_POST['last_name'];
//     $email = $_POST['email'];
//     $phoneNumber = $_POST['phone_number'];
//     $postalAddress = $_POST['postal_address'];
//     $abnNumber = $_POST['abn_number'];
//     $accountRate = $_POST['account_rate'];
//     $id = $_GET['id'];

//     $status = $stmt->execute();
//     if ($status === false) {
//         trigger_error($stmt->error, E_USER_ERROR);
//     }
//     printf("%d Row inserted.\n", $stmt->affected_rows);

//     $stmt->close();

//     //$conn->close();

//     $_SESSION['msg'] = "User Updated Succesfully";
//     header('location:Manager_Dashboard_User.php');
// }

?>
