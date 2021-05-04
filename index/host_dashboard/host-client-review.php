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
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>Host Review Dashboard</title>
    <!-- This page plugin CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/clientstyle.css" rel="stylesheet">
</head>


<body>
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script src="../../js/manageAccommodation.js"></script>
    <script src="../../js/manageuser.js"></script>
    

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
                                    <a class="nav-link" href="Mhost-client-review.php">Review</a>
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
                   
</body>
</html>