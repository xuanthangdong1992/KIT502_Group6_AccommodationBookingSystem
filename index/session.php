<?php
// start session
session_start();
//if the session for usename has not been set yet, initialise it
if(isset($_SESSION['session_user'])){
    $_SESSION['session_user']="";
}
// save username in the session
$session_user = $_SESSION['session_user'];
?>