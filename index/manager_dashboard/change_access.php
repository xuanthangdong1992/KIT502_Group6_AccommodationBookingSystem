<?php
include('../session.php');
include('../db_conn.php');

$user_id = $_POST["user_id"];
$account_type = $_POST["account_type"];

$sql = "UPDATE `account`SET`account_type`='$account_type' WHERE user_id = '$user_id'";

// $sql = "INSERT INTO `account`(account_type) VALUES('{$account_type}')";
if ($conn->query($sql) === TRUE){
    echo "success";
  }else{
    echo "fail";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>