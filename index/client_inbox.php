<!DOCTYPE html>
<?php
include ('session.php');
include ('db_conn.php');
?>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Main CSS file -->
	<link rel="stylesheet" href="../css/clientstyle.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title>Accommodation Booking System - Group 6</title>
    <!-- Css data table paging -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

       
</head>
<body>
	<!-- jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <!-- support call ajax -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

 <!-- Data table paging -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<div class="form-bg">
		<div class="main-page">
			<?php
				include ('header.php');
            ?>
            <h2>Inbox message</h2>
            <!-- Get list host contact -->
            <?php
            $client_id = $_SESSION["loginUsername"];
            $list_host_query = "SELECT DISTINCT `receiver` FROM `message` WHERE sender='$client_id'";
            $list_host_result = mysqli_query($conn, $list_host_query);
            // $countReviews = mysqli_num_rows($list_host_result);
            // echo $list_host_query;
            if (is_array($list_host_result) || is_object($list_host_result)){
                foreach($list_host_result as $row){
            ?>
            <div class="card text-white bg-dark">
            <div class="card-header">
                Host id: <?php echo $row['receiver']; ?>
            </div>
            <div class="card-body">
                <!-- Get last message content -->
                <?php
                    $receiver = $row['receiver'];
                    $list_message_query = "SELECT * FROM `message` WHERE sender='$client_id' AND receiver='$receiver' ORDER BY reading_time DESC LIMIT 1";
                    // echo $list_message_query;
                    $list_message_result = mysqli_query($conn, $list_message_query);
                    if (is_array($list_message_result) || is_object($list_message_result)){
                        foreach($list_message_result as $message){
                ?>
                <p class="card-text"> <?php echo $message['message_content']; ?></p>
                <p class="card-text" style="font-size: 10px;"> <?php echo date_format(date_create($message['reading_time']), "d/m/Y"); ?></p>
                <a href="#" class="btn btn-primary">Chat</a>
                <?php
                        }
                    }
                ?>
            </div>
            </div><br>
            <?php
                }
            }

            ?>


        </div>
    </div>
    <script type="text/javascript"> 
    </script>
</body>
</html>