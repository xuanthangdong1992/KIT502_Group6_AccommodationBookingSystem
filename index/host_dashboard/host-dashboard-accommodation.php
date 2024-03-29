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
                <h3>Accommodation Management </h3>
        </div>
        <!-- Accommodation management data table   -->
        <div class="table-responsive">
        <button type="button" class="btn btn-success" name="btn_add" id="btn_add" data-toggle="modal" data-target="#createAccModal">Add new House</button>
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
                            $jsonhouse = json_encode($house);
                    ?>
                    <tr>
                        <td><?php echo $house['accommodation_id']; ?></td>
                        <td><?php echo $house['house_name']; ?></td>
                        <td><?php echo $house['price']; ?></td>
                        <td><?php echo $house['city']; ?></td>
                        <td><?php echo $house['postal_code']; ?></td>
                        <td><i class="bi bi-star-fill" style="color: red;"></i> <?php echo number_format($house['accommodation_rate'], 1); ?></td>
                        <td>
                            <button type="button" class="btn btn-info" name="btn_details" id="btn_details" onclick="detailsHouse('<?php echo $house['accommodation_id'] ?>')">Details</button>
                            <button type="button" class="btn btn-warning" name="btn_edit" id="btn_edit" onclick='editHouse(<?php echo $jsonhouse; ?>)'>Edit</button>
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


<!-- add new accommodation Modal -->
<!-- Modal -->
<div class="modal fade" id="createAccModal" tabindex="-1" role="dialog" aria-labelledby="createAccModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3>Create new Accommodation</h3>
            <!--accommodation details-->
                <div class="form-group">
                    <label>House name: </label>
                    <input required="required" type="text" class="form-control" id="house_name" name="house_name">
                </div>
                <div class="form-group">
                    <label>Description: </label>
                    <textarea required="required" type="text" rows="4" class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label>Price (AUD):</label>
                        <input required="required" type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group col-4">
                        <label>Number of room: </label>
                        <input required="required" type="text" class="form-control col-3" id="number_of_room" name="number_of_room">
                    </div>
                    <div class="form-group col-5">
                        <label>Number of bathroom: </label>
                        <input required="required" type="text" class="form-control col-3" id="number_of_bathroom" name="number_of_bathroom">
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Smoke allowed: </label>
                        <input class="form-control" type="checkbox" name="smoke_allowed" id="smoke_allowed"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Garage: </label>
                        <input class="form-control" type="checkbox" name="garage" id="garage"> 
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Pet friendly: </label>
                        <input class="form-control" type="checkbox" name="pet_friendly" id="pet_friendly"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Internet: </label>
                        <input class="form-control" type="checkbox" name="internet_provided" id="internet_provided"> 
                    </div>
                    
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label for="checkin">Check in time: </label>
                        <input required="required" type="time" id="check_in_time" name="check_in_time">
                    </div>
                    <div class="form-group col-6">
                        <label for="checkout">Check out time: </label>
                        <input required="required" type="time" id="check_out_time" name="check_out_time">
                    </div>
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input required="required" type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input required="required" type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group col-md-4">
                        <label>State</label>
                        <select required="required" id="state" class="form-control" name="state">
                            <option>ACT</option>
                            <option>NSW</option>
                            <option>NT</option>
                            <option>QLD</option>
                            <option>SA</option>
                            <option selected>TAS</option>
                            <option>VIC</option>
                            <option>WA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal</label>
                        <input required="required" type="text" class="form-control" id="postal_code" name="postal_code">
                    </div>
                </div>
                <div class="form-group">
                    <label>Max guests allow: </label>
                    <input required="required" type="text" class="form-control" id="max_guests_allowed" name="max_guests_allowed">
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="addHouse('<?php echo $host_id; ?>')">Add</button>
                </div>
        </div>
    </div>
      
    </div>
  </div>
 <!-- add new accommodation Modal end--> 


<!-- Edit accommodation Modal -->
<div class="modal fade" id="editAccModal" tabindex="-1" role="dialog" aria-labelledby="editAccModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3>Edit Accommodation</h3>
            <!--accommodation details-->
                <div class="form-group">
                    <label>House name: </label>
                    <input required="required" type="text" class="form-control" id="edit_house_name" name="edit_house_name">
                </div>
                <div class="form-group">
                    <label>Description: </label>
                    <textarea required="required" type="text" rows="4" class="form-control" id="edit_description" name="edit_description"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label>Price (AUD):</label>
                        <input required="required" type="text" class="form-control" id="edit_price" name="edit_price">
                    </div>
                    <div class="form-group col-4">
                        <label>Number of room: </label>
                        <input required="required" type="text" class="form-control col-3" id="edit_number_of_room" name="edit_number_of_room">
                    </div>
                    <div class="form-group col-5">
                        <label>Number of bathroom: </label>
                        <input required="required" type="text" class="form-control col-3" id="edit_number_of_bathroom" name="edit_number_of_bathroom">
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Smoke allowed: </label>
                        <input class="form-control" type="checkbox" name="edit_smoke_allowed" id="edit_smoke_allowed"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Garage: </label>
                        <input class="form-control" type="checkbox" name="edit_garage" id="edit_garage"> 
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Pet friendly: </label>
                        <input class="form-control" type="checkbox" name="edit_pet_friendly" id="edit_pet_friendly"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Internet: </label>
                        <input class="form-control" type="checkbox" name="edit_internet_provided" id="edit_internet_provided"> 
                    </div>
                    
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label for="checkin">Check in time: </label>
                        <input required="required" type="time" id="edit_check_in_time" name="edit_check_in_time">
                    </div>
                    <div class="form-group col-6">
                        <label for="checkout">Check out time: </label>
                        <input required="required" type="time" id="edit_check_out_time" name="edit_check_out_time">
                    </div>
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input required="required" type="text" class="form-control" id="edit_address" name="edit_address">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input required="required" type="text" class="form-control" id="edit_city" name="edit_city">
                    </div>
                    <div class="form-group col-md-4">
                        <label>State</label>
                        <select required="required" id="edit_state" class="form-control" name="edit_state">
                            <option>ACT</option>
                            <option>NSW</option>
                            <option>NT</option>
                            <option>QLD</option>
                            <option>SA</option>
                            <option selected>TAS</option>
                            <option>VIC</option>
                            <option>WA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal</label>
                        <input required="required" type="text" class="form-control" id="edit_postal_code" name="edit_postal_code">
                    </div>
                </div>
                <div class="form-group">
                    <label>Max guests allow: </label>
                    <input required="required" type="text" class="form-control" id="edit_max_guests_allowed" name="edit_max_guests_allowed">
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-lg btn-block" name="btn_edit_acc" id="btn_edit_acc">Submit</button>
                </div>
        </div>
    </div>
      
    </div>
  </div>
 <!-- End Edit accommodation Modal --> 



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
            // add house 
            function addHouse(host_id){
            //get information from form.
            var house_name = $('#house_name').val();
            var description = $('#description').val();
            var price = $('#price').val();
            var number_of_room = $('#number_of_room').val();
            var number_of_bathroom = $('#number_of_bathroom').val();
            var smoke_allowed = document.getElementById("smoke_allowed").checked==true?'1':'0';
            var garage = document.getElementById("garage").checked==true?'1':'0';
            var pet_friendly = document.getElementById("pet_friendly").checked==true?'1':'0';
            var internet_provided = document.getElementById("internet_provided").checked==true?'1':'0';
            var check_in_time = $('#check_in_time').val();
            var check_out_time = $('#check_out_time').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var postal_code = $('#postal_code').val();
            var max_guests_allowed = $('#max_guests_allowed').val();
            $.ajax({
                            url: "host_dashboard_accommodation_process.php",
                            method: "POST",
                            data: {
                                house_name: house_name,
                                description: description,
                                price: price,
                                number_of_room: number_of_room,
                                number_of_bathroom: number_of_bathroom,
                                smoke_allowed: smoke_allowed,
                                garage: garage,
                                pet_friendly: pet_friendly,
                                internet_provided: internet_provided,
                                check_in_time: check_in_time,
                                check_out_time: check_out_time,
                                address: address,
                                city: city,
                                state: state,
                                postal_code: postal_code,
                                max_guests_allowed: max_guests_allowed,
                                host_id: host_id,
                                action: "add_house"
                            },
                            success: function(data) {
                                if (data == "success"){
                                    alert("Add new accommodation successful!");
                                    location.reload();
                                }
                            }
                        });

            }

            // edit house  
            function editHouse(house){
            var house_id = house.accommodation_id;
            //pass current value to form.
            $("#editAccModal").modal();
            document.getElementById("edit_house_name").value = house.house_name;
            document.getElementById("edit_description").value = house.description;
            document.getElementById("edit_price").value = house.price;
            document.getElementById("edit_number_of_room").value = house.number_of_room;
            document.getElementById("edit_number_of_bathroom").value = house.number_of_bathroom;
            //smoke allowed
            if(house.smoke_allowed == 1){
                document.getElementById("edit_smoke_allowed").checked = true;
            }else{
                document.getElementById("edit_smoke_allowed").checked = false;
            }
            //garage
            if(house.garage == 1){
                document.getElementById("edit_garage").checked = true;
            }else{
                document.getElementById("edit_garage").checked = false;
            }
            //pet friendly
            if(house.pet_friendly == 1){
                document.getElementById("edit_pet_friendly").checked = true;
            }else{
                document.getElementById("edit_pet_friendly").checked = false;
            }
            //internet provided
            if(house.internet_provided == 1){
                document.getElementById("edit_internet_provided").checked = true;
            }else{
                document.getElementById("edit_internet_provided").checked = false;
            }
            //time
            document.getElementById("edit_check_in_time").value = house.check_in_time;
            document.getElementById("edit_check_out_time").value = house.check_out_time;
            document.getElementById("edit_address").value = house.address;
            document.getElementById("edit_city").value = house.city;
            document.getElementById("edit_state").value = house.state;
            document.getElementById("edit_postal_code").value = house.postal_code;
            document.getElementById("edit_max_guests_allowed").value = house.max_guests_allowed;

            $("#btn_edit_acc").click(function() {
                 //get information from form.
            var house_name = $('#edit_house_name').val();
            var description = $('#edit_description').val();
            var price = $('#edit_price').val();
            var number_of_room = $('#edit_number_of_room').val();
            var number_of_bathroom = $('#edit_number_of_bathroom').val();
            var smoke_allowed = document.getElementById("edit_smoke_allowed").checked==true?'1':'0';
            var garage = document.getElementById("edit_garage").checked==true?'1':'0';
            var pet_friendly = document.getElementById("edit_pet_friendly").checked==true?'1':'0';
            var internet_provided = document.getElementById("edit_internet_provided").checked==true?'1':'0';
            var check_in_time = $('#edit_check_in_time').val();
            var check_out_time = $('#edit_check_out_time').val();
            var address = $('#edit_address').val();
            var city = $('#edit_city').val();
            var state = $('#edit_state').val();
            var postal_code = $('#edit_postal_code').val();
            var max_guests_allowed = $('#edit_max_guests_allowed').val();
                    $.ajax({
                            url: "host_dashboard_accommodation_process.php",
                            method: "POST",
                            data: {
                                house_name: house_name,
                                description: description,
                                price: price,
                                number_of_room: number_of_room,
                                number_of_bathroom: number_of_bathroom,
                                smoke_allowed: smoke_allowed,
                                garage: garage,
                                pet_friendly: pet_friendly,
                                internet_provided: internet_provided,
                                check_in_time: check_in_time,
                                check_out_time: check_out_time,
                                address: address,
                                city: city,
                                state: state,
                                postal_code: postal_code,
                                max_guests_allowed: max_guests_allowed,
                                house_id: house_id,
                                action: "edit_house"
                            },
                            success: function(data) {
                                if (data == "success"){
                                    alert("Edit accommodation successful!");
                                    location.reload();
                                }
                            }
                        });
                    });

            }
    </script>
</body>
</html>