<?php
include('../db_conn.php');
session_start();

$id = $_GET['id'];
$action = $_GET['action'];


if ($action == "delete") {
    $conn->query("delete from accommodation_review where accommodation_review_id='$id'");


    $_SESSION['msg'] = "Accommodation Review Deleted Succesfully";
    header('location:Manager_Dashboard_Review.php');


}
