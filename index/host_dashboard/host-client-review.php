<?php
include('../db_conn.php');
include('../session.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Host Dashboard</title>
    
    <!-- Local CSS   -->
    <link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/clientstyle.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>


<body>
    <!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- Bootstrap   -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <div class="management-nav">
    <?php
				include ('host_header.php');
			?>          
    </div>


    <?php
				$query=$conn->query("SELECT * FROM `accommodation_review`");
				while($row=$query->fetch_array()){
	?>
<!--This is a container for all the reviews of this accommodation-->
<div class="container">  
    <div class="col-md-16 single-review align-self-center">
        <!--This is the first review-->
        <div class="card card-body">
            <div>
                <!--This is the title of the review-->
                <h5 class="review-title text-truncate" data_reviewHeading="Good Experience">Accomodation Review</h5><br>
                <!--This is person who made the review-->
                <h6 class="review-name text-truncate border-10" data_userName="Andrew Smith">Accommodation ID: <?php echo $row["accommodation_id"]; ?></h6>
                <br>
                <p>Client_ID: <?php echo $row["client_id"]; ?></p>
                <p>Rating: <?php echo $row["rate"]; ?></p>
                
                <!--This is rate the user gave-->
                <div class="acc_accomodation_rate border-10" data_accommodation_rate="5"></div>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                </div>
                <div class="review-content">
                <!--This is the content of review-->    
                    <p class="note-inner-content text-muted " data_reviewContent="The staff were so friendly & helpful, the room was exceptionally clean & comfortable. The shower was awesome! The hotel felt new & modern but still comfy and welcoming. The location was spot on, we walked everywhere all weekend! Would love to stay there again soon!">Comment: <?php echo $row["comment"]; ?></p>
                </div>
                <!--This is the button to delete the review-->
                <div class="action-btn">
                    <a href="javascript:void(0)" class="far fa-trash-alt remove-review font-24"></a>
                </div>
        </div>
    </div>
   
        </div>
    </div>
</div>
<?php } ?>
             

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
                </script>
</body>
</html>