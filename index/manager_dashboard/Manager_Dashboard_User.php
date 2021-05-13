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
	<title>Manager Dashboard-User</title>
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
	<!-- validation plugin -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- Bootstrap   -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<div class="management-nav">
		<?php
		include('manager_header.php');
		?>
	</div>

	<div class="main_container">
		<div>
			<h3>User management </h3>
			<button type="button" class="btn btn-info" name="btn_add_user" id="btn_add_user" data-toggle="modal" data-target="#addUserModal"><i class="bi bi-person-plus-fill"></i> Add User</button>
		</div>

		<div class="table-responsive">
			<table id="user_table" class="table table-info table-bordered nowrap" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>User ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Account Type</th>
						<th>ABN Number</th>
						<th>Postal Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//Get booking data from database
					$admin_id = $_SESSION["loginUsername"];
					$query = "SELECT * FROM account WHERE user_id<>'$admin_id' AND account_status='active'";
					$result = mysqli_query($conn, $query);
					if (is_array($result) || is_object($result)) {
						foreach ($result as $account) {
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
									<button type="button" class="btn btn-primary" name="btn_edit_user" id="btn_edit_user" onclick="changeAccessLevel('<?php echo $account['user_id'] ?>')"><i class="bi bi-pencil-fill"></i> Change User Type</button>
									<button type="button" class="btn btn-danger" name="btn_delete_user" id="btn_delete_user" onclick="deleteUser('<?php echo $account['user_id'] ?>')"><i class="bi bi-person-x-fill"></i> Delete</button>
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
	<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- register form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Add New User</h3>
					<form id="addNewUserForm" action="controlU.php" method="post">
						<div class="form-group">
							<label>Account Type</label>
							<select required="required" id="account_type" class="form-control" name="account_type">
								<option value="client" selected>Client</option>
								<option value="host">Host</option>
								<option value="system manager">System Manager</option>
							</select>
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
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="register_button">Submit</button>
						</div>
					</form>
				</div>

			</div>
		</div>
		<!-- Add New User Modal -->
	</div>
	<!-- change access level of user   -->
	<div class="modal fade" id="changeAccessLevelModal" tabindex="-1" role="dialog" aria-labelledby="changeAccessLevelModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- payment form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Change User Type</h3>
					<form action="change_access.php" method="post">
						<div class="form-group">
							<label for="rate">Rate:</label>
							<select class="form-control" id="account_type" name="account_type">
								<option value="client">Client</option>
								<option value="host">Host</option>
								<option value="system manager">System Manager</option>
							</select>
						</div>
						<input type="hidden" name="user_id" id="user_id" value="0">

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="btn_leave_review" id="btn_leave_review" onclick="leave_review('<?php echo $accommodation_id; ?>', '<?php echo $username; ?>')">Submit</button>
						</input>
					</form>
					

				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		//data table process
		$(document).ready(function() {
			$('#user_table').DataTable({
				"scrollY": "550px",
				"scrollCollapse": true,
				"paging": false
			});
		});


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
		function deleteUser(user_id) {
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
						if (data == "success") {
							alert("Delete user success!")
							location.reload();
						}
					}
				});
			} else {

			}
		}

		function changeAccessLevel(user_id) {
			$("#user_id").val(user_id);
			$("#changeAccessLevelModal").modal();
		}

		// add new user
		$(document).ready(function() {
			// validate add new user form
			$('form[id="addNewUserForm"]').validate({
				rules: {
					username: 'required',
					password: {
						required: true,
						minlength: 6,
						maxlength: 12,
						passwordcheck: true
					},
					confirmPass: {
						required: true,
						equalTo: "#password"
					},
					firstName: 'required',
					lastName: 'required',
					email: {
						required: true,
						email: true
					},
					phoneNumber: {
						required: true,
						phonecheck: true
					},
					postalAddress: 'required',
					abnNumber: 'required',
				},
				messages: {
					username: '<span class="error">This field is required</span>',
					password: '<span class="error">Password is 6 to 12 characters in length and contains at least 1 lower case letter, 1 upper case letter, 1 number and 1 of following characters ! @ # $ %</span>',
					confirmPass: '<span class="error">The confirm password not matching</span>',
					firstName: '<span class="error">This field is required</span>',
					lastName: '<span class="error">This field is required</span>',
					email: '<span class="error">The email not valid</span>',
					phoneNumber: '<span class="error">This field is required and phone number contains only number</span>',
					postalAddress: '<span class="error">This field is required</span>',
					abnNumber: '<span class="error">This field is required</span>',
				},
				submitHandler: function(form) {
					var accountType = $('#account_type').val();
					var username = $('#username').val();
					var password = $('#password').val();
					var firstName = $('#firstName').val();
					var lastName = $('#lastName').val();
					var email = $('#email').val();
					var phoneNumber = $('#phoneNumber').val();
					var postalAddress = $('#postalAddress').val();
					var abnNumber = $('#abnNumber').val();
					$.ajax({
						url: 'controlU.php',
						method: 'POST',
						data: {
							accountType: accountType,
							username: username,
							password: password,
							firstName: firstName,
							lastName: lastName,
							email: email,
							phoneNumber: phoneNumber,
							postalAddress: postalAddress,
							abnNumber: abnNumber,
							action: "add_user"
						},
						// get success message from server
						success: function(data) {
							// if respond from server is "duplicate_user_id"
							if (data == 'duplicate_user_id') {
								alert("User id already exists, please enter another user id.");

							} else
								// if respond from server is "duplicate_email"
								if (data == 'duplicate_email') {
									alert("The email is already in use by another account. Please enter another email or contact us for help.");

								} else
									// if respond from server is "duplicate_phone_number"
									if (data == 'duplicate_phone_number') {
										alert("The phone number is already in use by another account. Please enter another phone number or contact us for help.");

									} else
							if (data == 'fail') {
								alert("Something wrong! Please register again.");
							} else {
								alert("Register successful!");
								location.reload();
							}
						}
					});

				}
			});
		});

		//password check
		$.validator.addMethod("passwordcheck", function(value) {
			return /[a-z]/.test(value) // has at least 1 lowercase letter
				&&
				/[A-Z]/.test(value) // has at least 1 uppercase letter
				&&
				/\d/.test(value) // has at least 1 digit
				&&
				/[!@#\$%]/.test(value) // has at least 1 following special characters ! @ # $ %
		});
		//phone number check
		$.validator.addMethod("phonecheck", function(value) {
			return /^[0-9]*$/.test(value) // has at least 1 lowercase letter
		});


		//show and hide ABN Number - add new user
		$(document).ready(function() {
			// hide and show abn number follow the choice host or client
			$("#hostOrClient").hide();
			var acc_type = document.getElementById("account_type");
			acc_type.onchange = function() {
				if (acc_type.value == 'host') {
					$("#hostOrClient").show();
				} else if (acc_type.value == 'client' || acc_type.value == 'system manager') {
					$("#hostOrClient").hide();
				}
			};
		});
	</script>

</body>

</html>