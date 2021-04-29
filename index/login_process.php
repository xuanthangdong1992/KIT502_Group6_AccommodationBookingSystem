<?php
include('session.php');
include('db_conn.php');

if(isset($_POST["loginUsername"])){
    $query = "SELECT * FROM account WHERE user_id = '".$_POST["loginUsername"]."' AND password = '".$_POST["loginPass"]."'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['loginUsername'] = $_POST['loginUsername'];  
           echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
}
if(isset($_POST["logout"]))  
{  
     unset($_SESSION["loginUsername"]);  
} 
?>