<?php
include('../db_conn.php');
include('../session.php');
$eid = $_GET['eid'];
$approval ="replied";
$napproval="pending";

$view="select * from message where message_id = '$eid' ";
$re = mysqli_query($conn,$view);
while ($row=mysqli_fetch_array($re))
{
	$id =$row['message_status'];

}

if($id=="replied")
{
	$sql ="UPDATE `message` SET `message_status`= '$approval' WHERE message_id = '$eid' ";
	if(mysqli_query($con,$sql))
	{
		header("Location: host-inbox.php");
	}
}
else {
$sql ="UPDATE `message` SET `message_status`= '$napproval' WHERE message_id = '$eid' ";
	if(mysqli_query($conn,$sql))
	{
		header("Location: host-inbox.php");
	}
}

?>