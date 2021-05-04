<?php  
include('../db_conn.php');
include('../session.php');
//session_start();  
//if(!isset($_SESSION["user"]))
//{
// header("location:host-dashboard.php");
//}
?> 
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>message</title>
    <!-- CCS STYLES-->
	<link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/clientstyle.css" rel="stylesheet">
   
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<!-- Bootstrap JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- This page plugin JQuery -->
    <script src="../../js/manageuser.js"></script>
    <script src="../../js/manageAccommodation.js"></script>

    <!-- validation plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <div class="management-nav">
    <header>
                <!-- bootstrap navigation bar -->
                <nav class="navbar navbar-expand-lg navbar-dark static-top">
                    <div class="container">
                        <a href="host-dashboard.php">
                            <img class="logo" src="../../img/logo.png" alt="">
                        </a>
                        <h2 style="color: white">Welcome to Host accommodation management</h2>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="host-dashboard.php">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-dashboard-booking.php">Host Booking management</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-client-review.php">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-inbox.php">Inbox</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Logout</a>
                                </li>
								
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- end bootstrap navigation bar -->
    </header>            
    </div>

   
				 <?php
				$mail = "SELECT * FROM `message`";
				$rew = mysqli_query($conn,$mail);
				
			   ?>
				 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h3>Send message to client</h3>
						<?php
						while($rows = mysqli_fetch_array($rew))
						{
								$app=$rows['message_status'];
								if($app=="Allowed")
								{
									
								}
						}
						?>
                        <p></p>
                        <p>
						<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">
                              Send New message
                            </button>
                            <!--mymodal-->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Compose New message</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
										<form action="" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Sender</label>
                                            <input name="sender" class="form-control" placeholder="Enter Title">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Receiver</label>
                                            <input name="receiver" class="form-control" placeholder="Enter Subject">
											</div>
                                        </div>
										<div class="modal-body">
										<div class="form-group">
										  <label for="comment">Message</label>
										  <textarea name="message" class="form-control" rows="5" id="comment"></textarea>
										</div>
										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="log" value="Send" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
							<?php
                            
							if(isset($_POST['log']))
							{	
								$log ="INSERT INTO `message`(`sender`, `receiver`, `message_content`) 
                                VALUES ($sender,$receiver,$content)";
                                 
                                 $sender=$_POST['sender'];
                                 $receiver=$_POST['receiver'];
                                 $content=$_POST['message_content'];
    
								if(mysqli_query($conn,$log))
								{
									echo '<script>alert("New message sent") </script>' ;				
								}
								
							}
							
								
							?>
                          
                        </p>
						
                    </div>
                </div>
            </div>
               <?php
				
				$sql = "SELECT * FROM `message`";
				$re = mysqli_query($conn,$sql);
				
			   ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>sender</th>
											<th>receiver</th>
                                            <th>content</th>
											<th>Status</th>
											<th>read time</th>
											<th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
                                            $id = $row['message_id'];
                                    ?>
						                <tr class='gradeC'>
													<td><?php echo $row['sender'] ?></td>
													<td><?php echo $row['receiver'] ?></td>
													<td><?php echo $row['message_content']?></td>
													<td><?php echo $row['message_status']?></td>
													<td><?php echo $row['reading_time']?></td>
													<td><a href="#myModal" class='btn btn-primary' data-toggle="modal"> <i class='fa fa-edit' ></i> Reply</button></td>
													<td><a href="message_conndel.php?id=<?php echo $row['message_id']; ?>"
                                                    class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
									</tr>
											
									<?php		
											}	
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                <!--table end-->
            

        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
  
</body>
</html>
