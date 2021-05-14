<?php
include('../session.php');
include('../db_conn.php');

$user_id = $_POST["user_id"];
$account_type = $_POST["edit_account_type"];
$sql = "UPDATE `account`SET`account_type`='$account_type' WHERE user_id = '$user_id'";
if ($conn->query($sql) === TRUE){
  header('Location: Manager_Dashboard_User.php');
  }else{
    echo "fail";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>