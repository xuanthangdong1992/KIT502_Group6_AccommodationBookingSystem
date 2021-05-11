<!DOCTYPE html>
<?php
include ('../session.php');
include ('../db_conn.php');
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Accommodation Dashboard</title>
	<!-- Local CSS file -->
	<link rel="stylesheet" href="../../css/clientstyle.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Icon font  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>
<body>
	<!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- Bootstrap   -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  <?php
    $accommodation_id = $_GET['id'];
    $query = "SELECT * FROM accommodation
    WHERE accommodation_id = '$accommodation_id'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
  ?>

<div class="management-nav">
    <?php
				include ('manager_header.php');
			?>          
    </div>
    <h1>Accommodation details</h1>
    <div>
      <!-- slider -->
      <div class="container">
      <?php
        $arr_img = explode(";", $row["image"]);
        for ($i = 1; $i <= count($arr_img); $i++) {    
            $path="../";    
            $img_url = $path .''. $arr_img[$i-1];
            $img_url = str_replace(' ', '', $img_url);
      ?>
         <div class="mySlides">
          <div class="numbertext"><?php echo $i;?>/<?php echo count($arr_img);?></div>
          <img class="img-slide" src="<?php echo $img_url; ?>">
        </div>
      <?php
        }
      ?>
        <a class="prev" onclick="plusSlides(-1)">❮❮</a>
        <a class="next" onclick="plusSlides(1)">❯❯</a>
      </div>
      <!-- end slider -->


      <!-- Accommodation details -->
      <div class="content-details">
        <h1><?php echo $row["house_name"];?></h1>
        <h5>Description: </h5>
        <p><?php echo $row["description"];?></p>
        <p><b>Price: <?php echo $row["price"];?> AUD</b></p>
        <p><b>Number of room:</b> <?php echo $row["number_of_room"];?></p>
        <p><b>Number of bathroom:</b> <?php echo $row["number_of_bathroom"];?></p>
        <p><b>Smoke allowed:</b> <?php echo $row["smoke_allowed"]==1?'Yes':'No';?></p>
        <p><b>Garage:</b> <?php echo $row["garage"]==1?'Yes':'No';?></p>
        <p><b>Pet friendly:</b> <?php echo $row["pet_friendly"]==1?'Yes':'No';?></p>
        <p><b>Internet provided:</b> <?php echo $row["internet_provided"]==1?'Yes':'No';?></p>
        <p><b>Check-in time:</b><?php echo $row["check_in_time"];?></p>
        <p><b>Check-out time:</b><?php echo $row["check_out_time"];?></p>
        <p><b>Address:</b> <?php echo $row["address"];?></p>
        <p><b>City:</b> <?php echo $row["city"];?></p>
        <p><b>Postal code:</b> <?php echo $row["postal_code"];?></p>
        <p><b>State:</b> <?php echo $row["state"];?></p>
        <p><b>Max guests allowed:</b> <?php echo $row["max_guests_allowed"];?></p>
        <hr class="solid">
        <!-- Accommodation review and rating -->
        <?php
          $queryAccommodationReview = "SELECT * FROM accommodation_review
          WHERE accommodation_id = '$accommodation_id'";
          $resultAccommdationReview = mysqli_query($conn, $queryAccommodationReview);
          $countReviews = mysqli_num_rows($resultAccommdationReview);

        ?>
        <p><b>Accommodation rate:</b> <i class="bi bi-star-fill" style="color: red;"></i> <?php echo $row["accommodation_rate"];?> (<?php echo $countReviews; ?> reviews)</p>
        <!-- Review list   -->
    
        <?php
        //just show 5 reviews. If client want to see more, they can click to view all reviews button. 
        $i = 0;
        foreach($resultAccommdationReview as $review){
        $i++;
        ?>
        <div class="card border-info mb-12">
          <div class="card-header">User: <?php echo $review["client_id"] ?> </div>
          <div class="card-body text-info">
            <p class="card-text"><i class="bi bi-star-fill" style="color: red;"></i> <?php echo $review["rate"] ?></p>
            <p class="card-title"><?php echo $review["comment"] ?></p>
          </div>
        </div><br>
        <?php
          if($i == 5){
            break;
          }
          }
        ?>
        <div class="submit-button">
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#reviewModal" >View all <?php echo $countReviews; ?> reviews</button>
        </div>
      </div>
      
      

    </div>

   
    <footer>
      <div class="footer">
      </div>
    </footer>


   <!-- review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- booking form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>All reviews</h1>
            <!-- Get user information -->
            <?php
        foreach($resultAccommdationReview as $review){
        ?>
        <div class="card border-info mb-12">
          <div class="card-header">User: <?php echo $review["client_id"] ?> </div>
          <div class="card-body text-info">
            <p class="card-text"><i class="bi bi-star-fill" style="color: red;"></i> <?php echo $review["rate"] ?></p>
            <p class="card-title"><?php echo $review["comment"] ?></p>
          </div>
        </div><br>
        <?php
          }
        ?>

				</div>
			</div>
		</div>
	</div>
	<!-- End review Modal -->

 
  <script>

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
							location.href="../index.php";
						}
					});
				});

			});
    
    //slider
    var slideIndex = 1;
    showSlides(slideIndex);
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slides[slideIndex-1].style.display = "block";
        }
  </script>

</body>
</html>