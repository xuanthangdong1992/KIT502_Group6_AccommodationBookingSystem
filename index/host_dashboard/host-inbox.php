<?php  
include('../db_conn.php');
include('../session.php');
?> 
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Host Dashboard</title>
	<!-- Local CSS file -->
	<link rel="stylesheet" href="../../css/clientstyle.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"></head>
<body>
    <!-- Data table paging -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <div class="management-nav">
    <?php
				include ('host_header.php');
			?>          
    </div>
    <div class="main_container">
        <h2>Inbox message</h2>
            <!-- Get list host contact -->
            <?php
            $host_id = $_SESSION["loginUsername"];
            $list_contact_query = "SELECT DISTINCT `receiver` FROM `message` WHERE sender='$host_id'";
            $list_contact_result = mysqli_query($conn, $list_contact_query);
            if (is_array($list_contact_result) || is_object($list_contact_result)){
                foreach($list_contact_result as $row){
            ?>
            <div class="card border-info">
            <div class="card-header">
                Client id: <?php echo $row['receiver']; ?>
            </div>
            <div class="card-body">
                <!-- Get last message content -->
                <?php
                    $receiver = $row['receiver'];
                    $list_message_query = "SELECT * FROM `message` WHERE sender='$host_id' AND receiver='$receiver' ORDER BY sending_time DESC LIMIT 1";
                    // echo $list_message_query;
                    $list_message_result = mysqli_query($conn, $list_message_query);
                    if (is_array($list_message_result) || is_object($list_message_result)){
                        foreach($list_message_result as $message){
                ?>
                <p class="card-text"> <?php echo $message['message_content']; ?></p>
                <p class="card-text" style="font-size: 10px;"> <?php echo date_format(date_create($message['sending_time']), "d/m/Y"); ?></p>
                <?php
                        }
                    }
                ?>
                <button type="button" class="btn btn-primary" onclick="showChatBox('<?php echo $host_id; ?>', '<?php echo $receiver; ?>')">Chat</button>
            </div>
            </div><br>
            <?php
                }
            }
            ?>
    </div>
     <!-- Chat Modal  -->
     <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="mes_container">
				<div class="modal-body" id="message_content_box">
				</div>
                <div class="modal-footer">
                            <div class="input-group mb-3">
                                <textarea class="form-control" placeholder="Type message.." name="input_mes" id="input_mes" rows="1"></textarea>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" name="btn_send_mes" id="btn_send_mes" onclick="sendMessage('<?php echo $host_id; ?>')">Send</button>
                                </div>
                            </div>
                </div>
			</div>
		</div>
	</div>
    <script type="text/javascript">
           //logout process
		$(document).ready(function() {
				$('#logout').click(function() {
					var logout = "logout";
					$.ajax({
						url: "../login_process.php",
						method: "POST",
						data: {
							logout: logout
						},
						success: function() {
							location.href = "../index.php";						}
					});
				});

			});
            // show chatbox function  
          function showChatBox(host_id, receiver_id){
            $("#chatModal").modal();
                $.ajax({
                        url: "host_inbox_process.php",
                        method: "POST",
                        data: {
                            host_id: host_id,
                            receiver_id: receiver_id,
                            action: "show_messages"
                        },
                        success: function(data) {
                            $('#message_content_box').html(data);

                        }
                    });
            }
            //send message
            function sendMessage(host_id){
                var mes_content = $('#input_mes').val();
                var contact_id = $('#get_receiver_id').val();
                if(mes_content != ""){
                    $.ajax({
                        url: "host_inbox_process.php",
                        method: "POST",
                        data: {
                            host_id: host_id,
                            contact_id: contact_id,
                            mes_content: mes_content ,
                            action: "insert_message"
                        },
                        success: function(data) {

                            $('#message_content_box').append(data);
                        }
                    });
                }
            }
    </script>  
</body>
</html>
