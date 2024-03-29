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
    <title>Accommodation Booking System - Group 6</title>
	<!-- Local CSS file -->
	<link rel="stylesheet" href="../css/clientstyle.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

</head>
<body>
    <!-- Data table paging -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  

	<div class="form-bg">
		<div class="main-page">
			<?php
				include ('header.php');
            ?>
    <!-- Data table paging -->
    <!-- <div class="table-responsive"> -->
    <!-- <div class="container"> -->
    <table id="reviews_table" class="table table-dark table-bordered nowrap dt-responsive v-middle" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>Review ID</th>
                <th>Accommondation ID</th>
                <th>Rate</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                // check user loged in or not.
                if(!isset($_SESSION["loginUsername"])){
                    //redirect to index page
                    header('Location: index.php');
                }
                //Get booking data from database
                $client_id = $_SESSION["loginUsername"];
                $reviews_query = "SELECT * FROM accommodation_review WHERE client_id = '$client_id'";
                $reviews_list_result = mysqli_query($conn, $reviews_query);
                if (is_array($reviews_list_result) || is_object($reviews_list_result)){
                foreach($reviews_list_result as $review){
			?>
            <tr>
                <td><?php echo $review['accommodation_review_id']; ?></td>
                <td><a href="accommodation-details.php?id=<?php echo $review['accommodation_id']; ?>"><?php echo $review['accommodation_id']; ?> - More details</a></td>
                <td><?php echo $review['rate']; ?></td>
                <td><?php echo $review['comment']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="inner btn btn-warning" name="btn_edit" id="btn_edit" onclick="editReview('<?php echo $review['accommodation_review_id'] ?>', '<?php echo $review['rate'] ?>', '<?php echo $review['comment'] ?>',  '<?php echo $review['accommodation_id'] ?>')">Edit</button>
                        <button type="button" class="inner btn btn-danger" name="btn_delete" id="btn_delete" onclick="deleteReview('<?php echo $review['accommodation_review_id'] ?>', '<?php echo $review['accommodation_id'] ?>')">Delete</button>
                    </div>
                </td>
            </tr>
            <?php
            }
        }
            ?>
        </tbody>
    </table>

<!-- </div> -->

        </div>
    </div>


    <!-- Edit review modal -->
    <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="editReviewModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- payment form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Edit review</h3>
                    <!-- Get review details -->
                    <form id="editReviewForm" action="client_dashboard_process.php" method="post">
                        <div class="form-group">
                            <label for="rate">Rate: </label>
							<select class="form-control" id="rate" name="rate">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5" selected>5</option>
							</select>
						</div>
                        <div class="form-group">
                            <label for="comment">Enter new comment: </label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-lg btn-block" name="edit_review_button" id="edit_review_button" >Edit</button>
						</div>
                        </form>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript">
            //data table process
            $(document).ready(function() {
                $('#reviews_table').DataTable(
                    {
                        "scrollY":        "550px",
                        "scrollCollapse": true,
                        "paging":         false
                    }
                );
            });
            
            //logout process
			$(document).ready(function() {
				$('#logout').click(function() {
					var logout = "logout";
					$.ajax({
						url: "login_process.php",
						method: "POST",
						data: {
							logout: logout
						},
						success: function() {
                            //when client logout this will redirect to home page.
							location.href="index.php";
						}
					});
				});

			});

        // delete review
        function deleteReview(review_id, accommodation_id){
            // var table = $('#booking_table').DataTable();
            var r = confirm("Do you really want to delete this review?");
            if (r == true) {
                // edit status to cancel
                $.ajax({
						url: "client_dashboard_process.php",
						method: "POST",
						data: {
                            accommodation_id: accommodation_id,
							review_id: review_id,
                            action: "delete_review"
						},
						success: function(data) {
                            alert(data);
                            if (data == "success"){
                                location.reload();
                            }
						}
					});
            } else {
                
            } 
        }

        //edit review
        function editReview(review_id, rate, comment, accommodation_id){
            $("#editReviewModal").modal();
            //set current value
            document.getElementById("rate").value = rate;
            document.getElementById("comment").value = comment;
            $("#edit_review_button").click(function() {
                var rate = $('#rate').val();
                var comment = $('#comment').val(); 

                $.ajax({

                        url: "client_dashboard_process.php",
                        method: "POST",
                        data: {
                            accommodation_id: accommodation_id,
                            rate: rate,
                            comment: comment,
                            review_id: review_id,
                            action: "edit_review"
                        },
                        success: function(data) {
                            if (data == "success"){
                                alert("Edit success!");
                                location.reload();
                            }
                        }
                    });
                });
            }
    </script>
</body>
</html>