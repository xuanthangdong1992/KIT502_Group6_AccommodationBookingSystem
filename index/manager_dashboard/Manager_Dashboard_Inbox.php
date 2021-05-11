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
		include ('manager_header.php');
	?>          
    </div>
    <div class="main_container">
        <h2>Inbox message</h2>
        <!-- Get list host contact -->
        <!-- Data table paging -->
<div class="table-responsive">
    <table id="inbox_table" class="table table-info table-bordered nowrap" style="width: 100%">
        <thead class="thead-dark">
            <tr>
                <th>sender</th>
                <th>receiver</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                //Get booking data from database
                $admin_id = $_SESSION["loginUsername"];
                $query = "SELECT DISTINCT `sender`, `receiver` FROM `message`";
                $result = mysqli_query($conn, $query);
                if (is_array($result) || is_object($result)){
                foreach($result as $row){
			?>
                            <tr>
                                <td><?php echo $row['sender']; ?></td>
                                <td><?php echo $row['receiver']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" name="btn_inbox_details" id="btn_inbox_details" onclick="showChatBox('<?php echo $row['sender']; ?>', '<?php echo $row['receiver']; ?>')">Details</button>
                                </td>
                            </tr>
            <?php
            }
        }
            ?>
        </tbody>
    </table>
</div>
<!-- End table   -->
    </div>
     <!-- Chat Modal  -->
     <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="mes_container">
				<div class="modal-body" id="message_content_box">
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript">
     //data table process
     $(document).ready(function() {
                $('#inbox_table').DataTable(
                    {
                        "scrollY":        "550px",
                        "scrollCollapse": true,
                        "paging":         false
                    }
                );
            } );
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
          function showChatBox(sender, receiver){
            $("#chatModal").modal();
                $.ajax({
                        url: "manager_inbox_process.php",
                        method: "POST",
                        data: {
                            sender: sender,
                            receiver: receiver,
                            action: "show_messages"
                        },
                        success: function(data) {
                            $('#message_content_box').html(data);

                        }
                    });
            }
            
    </script>  
</body>
</html>
