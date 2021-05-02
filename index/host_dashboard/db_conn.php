<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "group6_accommodation_assignment";
// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
// if connection fail
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  exit();
}
?>
