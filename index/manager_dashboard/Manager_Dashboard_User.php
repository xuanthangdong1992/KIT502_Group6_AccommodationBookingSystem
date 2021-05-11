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
	<title>Admin Dashboard</title>
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
    <div>
            <h3>User management </h3>
            <button type="button" class="btn btn-info" name="btn_add_user" id="btn_add_user"><i class="bi bi-person-plus-fill"></i> Add User</button>
    </div>

    <div class="table-responsive">
    <table id="user_table" class="table table-info table-bordered nowrap" style="width: 100%">
        <thead class="thead-dark">
                    <th class="font-weight-bold">User ID</th>
                    <th class="font-weight-bold">First Name</th>
                    <th class="font-weight-bold">Last Name</th>
                    <th class="font-weight-bold">Email</th>
                    <th class="font-weight-bold">Phone Number</th>
                    <th class="font-weight-bold">Account Type</th>
                    <th class="font-weight-bold">ABN Number</th>
                    <th class="font-weight-bold">Postal Address</th>
                    <th class="font-weight-bold">Action</th>
                </thead>
                <tbody>
                <?php
                //Get booking data from database
                $admin_id = $_SESSION["loginUsername"];
                $query = "SELECT * FROM account WHERE user_id<>'$admin_id' AND account_status='active'";
                $result = mysqli_query($conn, $query);
                if (is_array($result) || is_object($result)){
                foreach($result as $account){
			?>
            <tr>
                <td><?php echo $account['user_id']; ?></td>
                <td><?php echo $account['first_name']; ?></td>
                <td><?php echo $account['last_name']; ?></td>
                <td><?php echo $account['email']; ?></td>
                <td><?php echo $account['phone_number']; ?></td>
                <td><?php echo $account['account_type']; ?></td>
                <td><?php echo $account['abn_number']; ?></td>
                <td><?php echo $account['postal_address']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" name="btn_edit_user" id="btn_edit_user"><i class="bi bi-pencil-fill"></i> Edit</button>
                    <button type="button" class="btn btn-danger" name="btn_delete_user" id="btn_delete_user" onclick="deleteUser('<?php echo $account['user_id']; ?>')"><i class="bi bi-person-x-fill"></i> Delete</button>
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


<!-- Add New User Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- register form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Register</h1>

					<form id="registrationForm" action="registrationProcess.php" method="post">
						<div class="form-group required">
							<div>
								<label class="label-control">Account Type:</label>
								<input type="radio" class="accountType" name="accountType" value="host" />
								<label for="host">Host</label>
								<input type="radio" class="accountType" name="accountType" value="client" checked="checked" />
								<label for="client">Client</label>
							</div>
						</div>

						<div class="form-group required">
							<label class="label-control">Username:</label>
							<input class="form-control" type="text" id="username" name="username" />
						</div>
						<div class="form-group required">
							<label class="label-control">Password:</label>
							<input class="form-control" type="password" id="password" name="password" />
						</div>
						<div class="form-group required">
							<label class="label-control">Confirm Password:</label>
							<input class="form-control" type="password" id="confirmPass" name="confirmPass" />
						</div>


						<div class="form-group required">
							<label class="label-control">First Name:</label>
							<input class="form-control" type="text" id="firstName" name="firstName" />
						</div>
						<div class="form-group required">
							<label class="label-control">Last Name:</label>
							<input class="form-control" type="text" id="lastName" name="lastName" />
						</div>
						<div class="form-group required">
							<label class="label-control">Email:</label>
							<input class="form-control" type="text" id="email" name="email" />
						</div>
						<div class="form-group required">
							<label class="label-control">Phone Number:</label>
							<input class="form-control" type="text" id="phoneNumber" name="phoneNumber" />
						</div>
						<div class="form-group required">
							<label class="label-control">Postal Address:</label>
							<input class="form-control" type="text" id="postalAddress" name="postalAddress" />
						</div>
						<div id="hostOrClient" class="form-group required">
							<label class="label-control">ABN Number:</label>
							<input class="form-control" type="text" id="abnNumber" name="abnNumber" />
						</div>
						<div class="submit-button">
							<button type="submit" class="btn btn-primary" name="register_button">Register</button>
						</div>
					</form>
				</div>

			</div>
		</div>
		<!-- Add New User Modal -->




    <script type="text/javascript">
        //data table process
        $(document).ready(function() {
                $('#user_table').DataTable(
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


        $(document).ready(function() {
            // hide and show abn number follow the choice host or client
            $("#ABN").hide();
            $(".form-control").change(function() {
                if (this.value == 'Host') {
                    $("#ABN").show();
                } else if (this.value == 'Client' || this.value == 'System Manager') {
                    $("#ABN").hide();
                }
            });
        });

        //delete user
        function deleteUser(user_id){
            var r = confirm("Do you really want to delete this user? This action can not undo.");
                if (r == true) {
                    $.ajax({
                            url: "controlU.php",
                            method: "POST",
                            data: {
                                user_id: user_id,
                                action: "delete_user"
                            },
                            success: function(data) {
                                // alert(data);
                                if (data == "success"){
                                    alert("Delete user success!")
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