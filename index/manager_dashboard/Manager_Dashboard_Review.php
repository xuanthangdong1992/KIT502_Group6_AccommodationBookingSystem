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
	<title>Manager Dashboard-Review</title>
    <!-- Local CSS file -->
	<link href="../../css/clientstyle.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">  
    <!-- Icon font  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>

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
<div class="card card-body">
        <h3>Reviews Management </h3>
</div>
<!-- Data table paging -->
<div class="table-responsive">
    <table id="booking_table" class="table table-info table-bordered nowrap" style="width: 100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Accommodation ID</th>
                <th>Rate by</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                //Get booking data from database
                $admin_id = $_SESSION["loginUsername"];
                $query = "SELECT * FROM accommodation_review";
                $result = mysqli_query($conn, $query);
                if (is_array($result) || is_object($result)){
                foreach($result as $review){
			?>
            <tr>
                <td><?php echo $review['accommodation_review_id']; ?></td>
                <td><a href="manager_accommodation_details.php?id=<?php echo $review['accommodation_id']; ?>"><?php echo $review['accommodation_id']; ?> (Click for more details)</a></td>
                <td><?php echo $review['client_id']; ?></td>
                <td><i class="bi bi-star-fill" style="color: red;"></i> <?php echo $review['rate']; ?></td>
                <td><?php echo $review['comment']; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" name="btn_cancel" id="btn_cancel" onclick="deleteReview('<?php echo $review['accommodation_review_id'] ?>')"><i class="bi bi-trash-fill"></i>  Delete</button>
                </td>
                
            </tr>
            <?php
            }
        }
            ?>
        </tbody>
    </table>
</div>
</div>
    
<script type="text/javascript">
            //data table process
            $(document).ready(function() {
                $('#booking_table').DataTable(
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
							location.href = "../index.php";						
                        }
					});
				});

			});
       
        //delete review
        function deleteReview(review_id){
            var r = confirm("Do you really want to delete this review? This action can not redo.");
                if (r == true) {
                    $.ajax({
                            url: "controlR.php",
                            method: "POST",
                            data: {
                                review_id: review_id,
                                action: "delete_review"
                            },
                            success: function(data) {
                                // alert(data);
                                if (data == "success"){
                                    alert("Delete review success.");
                                    location.reload();
                                }
                            }
                        });
                } else {
                    
                } 
        }
    </script>
</body>
</html>