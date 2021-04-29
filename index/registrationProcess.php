<?php
// connect database
include('db_conn.php');
// If the event is not registered, it will not process
// if (!isset($_POST['username'])){
//     die('');
// }

//get data from registration form
$accounttype = addslashes($_POST['accountType']);
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$firstname = addslashes($_POST['firstName']);
$lastname = addslashes($_POST['lastName']);
$email = addslashes($_POST['email']);
$phonenumber = addslashes($_POST['phoneNumber']);
$postaladdress = addslashes($_POST['postalAddress']);
$abnnumber = addslashes($_POST['abnNumber']);

//encrypted password
// $password = md5($password);
printf(mysqli_num_rows(mysqli_query($conn, "SELECT user_id FROM account WHERE user_id='$username'")));
//check if username already exist
if (mysqli_num_rows(mysqli_query($conn, "SELECT user_id FROM account WHERE user_id='$username'")) > 0){
    printf("dsadas");
}

//check if email is already exist
//check if phone number is already exist
// check if abn number already exist

?>