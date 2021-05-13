<?php
include('session.php');
include('db_conn.php');

if (isset($_POST["loginUsername"])) {
    $password = $_POST["loginPass"];
    //encryt password
    $password = crypt($password, "group6");
    $query = "SELECT * FROM account WHERE user_id = '" . $_POST["loginUsername"] . "' AND password = '" . $password . "' AND account_status='active'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        // divide role when login
        $_SESSION['loginUsername'] = $_POST['loginUsername'];
        //system manager
        if($row["account_type"] == "system manager"){
            $_SESSION["permission"] = "system_manager";
            echo 'system_manager';
        } else
        //client
        if($row["account_type"] == "client"){
            $_SESSION["permission"] = "client";
            echo 'client';
        }else
        //host
        if($row["account_type"] == "host") {
            $_SESSION["permission"] = "host";
            echo 'host';
        }
        
    } else {
        echo 'fail';
    }
}
if (isset($_POST["logout"])) {
    unset($_SESSION["loginUsername"]);
    unset($_SESSION["permission"]);
}

?>
