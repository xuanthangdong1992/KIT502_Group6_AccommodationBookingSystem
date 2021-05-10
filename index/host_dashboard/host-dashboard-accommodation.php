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
				include ('host_header.php');
			?>          
    </div>
    <div class="main_container">
        <div class="card card-body">
                <h3>Accmmodation Management </h3>
        </div>
        <!-- Accommodation management data table   -->
        <div class="table-responsive">
        <button type="button" class="btn btn-success" name="btn_add" id="btn_add">Add new House</button>
            <table id="booking_table" class="table table-info table-bordered nowrap" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>House Name</th>
                        <th>Price</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Accommodation Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        //Get booking data from database
                        $host_id = $_SESSION["loginUsername"];
                        $query = "SELECT * FROM accommodation WHERE host_id='$host_id'";
                        $result = mysqli_query($conn, $query);
                        if (is_array($result) || is_object($result)){
                        foreach($result as $house){
                    ?>
                    <tr>
                        <td><?php echo $house['accommodation_id']; ?></td>
                        <td><?php echo $house['house_name']; ?></td>
                        <td><?php echo $house['price']; ?></td>
                        <td><?php echo $house['city']; ?></td>
                        <td><?php echo $house['postal_code']; ?></td>
                        <td><i class="bi bi-star-fill" style="color: red;"></i> <?php echo $house['accommodation_rate']; ?></td>
                        <td>
                            <button type="button" class="btn btn-info" name="btn_details" id="btn_details" onclick="detailsHouse('<?php echo $house['accommodation_id'] ?>')">Details</button>
                            <button type="button" class="btn btn-warning" name="btn_edit" id="btn_edit">Edit</button>
                            <button type="button" class="btn btn-danger" name="btn_delete" id="btn_delete" onclick="deleteHouse('<?php echo $house['accommodation_id'] ?>')">Delete</button>
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
            // delete house
            function deleteHouse(house_id){
                var r = confirm("Do you really want to delete this house?");
                if (r == true) {
                    $.ajax({
                            url: "host_dashboard_accommodation_process.php",
                            method: "POST",
                            data: {
                                house_id: house_id,
                                action: "delete_house"
                            },
                            success: function(data) {
                                if (data == "success"){
                                    location.reload();
                                }
                            }
                        });
                } else {
                    
                } 
            }
            //details house
            function detailsHouse(house_id){
                location.href = "host_accommodation_details.php?id="+house_id;		
            }
    </script>
</body>
</html>