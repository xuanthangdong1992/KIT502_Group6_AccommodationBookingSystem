<?php
// connect database
include('../db_conn.php');
include('../session.php');

if ($_POST['action']=="change_info") {
    $user_id = $_SESSION["loginUsername"];
    $firstName = addslashes($_POST['firstName']);
    $lastName = addslashes($_POST['lastName']);
    $email = addslashes($_POST['email']);
    $phoneNumber = addslashes($_POST['phoneNumber']);
    $postalAddress = addslashes($_POST['postalAddress']);
    $query = "UPDATE `account` SET `first_name`='$firstName',`last_name`='$lastName',`email`='$email',`phone_number`='$phoneNumber',`postal_address`='$postalAddress' WHERE `user_id`='$user_id'";
    if ($conn->query($query)) {
        echo 'success';
    } else {
        echo 'fail';
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else 
if ($_POST['action']=="change_pass"){
    $user_id = $_SESSION["loginUsername"];
    $oldPassword = addslashes($_POST['oldPassword']);
    //encrypt old password
    $oldPassword = crypt($oldPassword, "group6");
    $password = addslashes($_POST['password']);
    //encrypt password
    $password = crypt($password, "group6");
    //check old password is matching or not
    $check_old_pass = "SELECT password FROM account WHERE user_id = '$user_id' AND password='$oldPassword'";
    if(mysqli_num_rows(mysqli_query($conn, $check_old_pass)) == 0){
        echo 'oldpass_wrong';
    }else{
        $query = "UPDATE `account` SET `password`='$password' WHERE `user_id`='$user_id'";
        if ($conn->query($query)) {
            echo 'success';
        } else {
            echo 'fail';
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo 'not found action!';
}
