<?php
include('../session.php');
include('../db_conn.php');
// This is the controler of function-delete/add/edit user
// delete house
if($_POST['action'] == "delete_user"){
    $user_id = addslashes($_POST['user_id']);
    $query = "UPDATE `account` SET `account_status`='inactive' WHERE user_id='$user_id'";
    if ($conn->query($query)){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else
  if($_POST['action'] == "add_user"){
      //get data from request
    $accountType = addslashes($_POST['accountType']);
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $firstName = addslashes($_POST['firstName']);
    $lastName = addslashes($_POST['lastName']);
    $email = addslashes($_POST['email']);
    $phoneNumber = addslashes($_POST['phoneNumber']);
    $postalAddress = addslashes($_POST['postalAddress']);
    $abnNumber = "";
    $query = "";
    //Processing the query when the user chooses a client or a host when register account.
    if ($accountType == "host") {
        //query for host
        $abnNumber = addslashes($_POST['abnNumber']);
        $query = "INSERT INTO account (user_id, password, account_type, first_name, last_name, email, phone_number, postal_address, abn_number, account_status) VALUES ('$username', '$password', '$accountType', '$firstName', '$lastName', '$email', '$phoneNumber', '$postalAddress', '$abnNumber', 'active')";
    } else {
        //query for client or admin
        $query = "INSERT INTO account (user_id, password, account_type, first_name, last_name, email, phone_number, postal_address, account_status) VALUES ('$username', '$password', '$accountType', '$firstName', '$lastName', '$email', '$phoneNumber', '$postalAddress', 'active')";
    }
    // check duplicate user id query
    $check_user_id = "SELECT user_id FROM account WHERE user_id = '$username'";
    // check duplicate email
    $check_email = "SELECT email FROM account WHERE email = '$email'";
    //check duplicate phone number
    $check_phone_number = "SELECT phone_number FROM account WHERE phone_number = '$phoneNumber'";
    //check if user id already exist
    if (mysqli_num_rows(mysqli_query($conn, $check_user_id)) > 0) {
        echo 'duplicate_user_id';
    } else  
    //check if email already exist
    if (mysqli_num_rows(mysqli_query($conn, $check_email)) > 0) {
        echo 'duplicate_email';
    } else  
    //check if phone number already exist
    if (mysqli_num_rows(mysqli_query($conn, $check_phone_number)) > 0) {
        echo 'duplicate_phone_number';
    } else  
    
    // When all the conditions have been met - insert database
    if ($conn->query($query)) {
        echo 'success';
    } else {
        echo 'fail';
    }
  }else 
  if($_POST['action'] == "edit_user"){
    //get data from request
  
} else {
    echo "action not found!";
  }

?>
