<?php
//starting session
session_start();

//initialise session if it has been not created yet.
if(!isset($_SESSION['session_user'])){
	$_SESSION['session_user']="";
}
//save username in the session 
$session_user=$_SESSION['session_user'];
?>