<?php
include ('db_conn.php');
$eid = $_GET['eid'];
$approval ="confirm";
$napproval="reject";

$view="select * from message where message_id = '$eid' ";
$re = mysqli_query($conn,$view);
while ($row=mysqli_fetch_array($re))
{
	$id =$row['message_status'];

}

if($id=="confirm")
{
	$sql ="UPDATE `message` SET `message_staus`= '$approval' WHERE message_id = '$eid' ";
	if(mysqli_query($con,$sql))
	{
		echo '<script>alert("confirm") </script>' ;
		header("Location: messages.php");
	}
}
else {
$sql ="UPDATE `message` SET `message_staus`= '$napproval' WHERE message_id = '$eid' ";
	if(mysqli_query($conn,$sql))
	{
		echo '<script>alert("reject") </script>' ;
		header("Location: messages.php");
	}



}
?>