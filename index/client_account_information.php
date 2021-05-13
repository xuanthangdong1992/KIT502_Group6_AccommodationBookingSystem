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


	<div class="form-bg">
		<div class="main-page">
			<?php
				include ('header.php');
            ?>
            <h3>Account information</h3>

            <!-- Client information  -->
            <?php
            // check user loged in or not.
            if(!isset($_SESSION["loginUsername"])){
                //redirect to index page
                header('Location: index.php');
            }
            $client_id = $_SESSION["loginUsername"];
            $query = "SELECT * FROM `account` WHERE user_id='$client_id'";
            $result = mysqli_query($conn, $query);
            if (is_array($result) || is_object($result)){
                foreach($result as $account){
            ?>
            <h2><?php echo $account['first_name']; ?> <?php echo $account['last_name']; ?></h2>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID:</label>
                <label class="col-sm-10 col-form-label"><?php echo $account['user_id']; ?></label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Account type:</label>
                <label class="col-sm-10 col-form-label"><?php echo $account['account_type']; ?></label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email:</label>
                <label class="col-sm-10 col-form-label"><?php echo $account['email']; ?></label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone Number</label>
                <label class="col-sm-10 col-form-label"><?php echo $account['phone_number']; ?></label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Postal Address:</label>
                <label class="col-sm-10 col-form-label"><?php echo $account['postal_address']; ?></label>
            </div>
            <div class="form-group row">
                <button type="button" class="btn btn-warning col-sm-2" name="btn_change_pass" id="btn_change_pass" data-toggle="modal" data-target="#changePassModal"><i class="bi bi-shield-lock-fill"></i>Change password</button>
                <button type="button" class="btn btn-info col-sm-2" name="btn_change_info" id="btn_change_info" data-toggle="modal" data-target="#changeInfoModal"><i class="bi bi-info-circle-fill"></i>Change Info</button>
            </div>
       
        </div>
    </div>



    <!-- Change Info Modal -->
	<div class="modal fade" id="changeInfoModal" tabindex="-1" role="dialog" aria-labelledby="changeInfoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- change info form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Change Information</h3>
					<form id="changeInfoForm" action="registrationProcess.php" method="post">
						<div class="form-group required row">
							<label class="label-control col-sm-4">First Name:</label>
							<input class="form-control col-sm-8" type="text" id="firstName" name="firstName" value="<?php echo $account['first_name']; ?>"/>
						</div>
						<div class="form-group required row">
							<label class="label-control col-sm-4">Last Name:</label>
							<input class="form-control col-sm-8" type="text" id="lastName" name="lastName" value="<?php echo $account['last_name']; ?>"/>
						</div>
						<div class="form-group required row">
							<label class="label-control col-sm-4">Email:</label>
							<input class="form-control col-sm-8" type="text" id="email" name="email" value="<?php echo $account['email']; ?>"/>
						</div>
						<div class="form-group required row">
							<label class="label-control col-sm-4">Phone Number:</label>
							<input class="form-control col-sm-8" type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $account['phone_number']; ?>"/>
						</div>
						<div class="form-group required row">
							<label class="label-control col-sm-4">Postal Address:</label>
							<input class="form-control col-sm-8" type="text" id="postalAddress" name="postalAddress" value="<?php echo $account['postal_address']; ?>"/>
						</div>
						<div class="submit-button">
							<button type="submit" class="btn btn-primary" name="btn_save">Save</button>
						</div>
					</form>
				</div>

			</div>
		</div>
        </div>
		<!-- Change Info Modal -->

        <?php
                }
            }
            ?>
    <!-- Change Pass Modal -->
	<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="changePassModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- change pass form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3>Change Password</h3>
					<form id="changePassForm" action="registrationProcess.php" method="post">
                        <div class="form-group required row">
							<label class="label-control col-sm-4">Old password:</label>
							<input class="form-control col-sm-8" type="password" id="oldPassword" name="oldPassword" />
						</div>
                        <div class="form-group required row">
							<label class="label-control col-sm-4">New password:</label>
							<input class="form-control col-sm-8" type="password" id="password" name="password" />
						</div>
						<div class="form-group required row">
							<label class="label-control col-sm-4">Confirm New password:</label>
							<input class="form-control col-sm-8" type="password" id="confirmPass" name="confirmPass" />
						</div>
						<div class="submit-button">
							<button type="submit" class="btn btn-primary" name="btn_change_pass">Change</button>
						</div>
					</form>
				</div>

			</div>
		</div>
		<!-- Change Pass Modal -->



    




    <script type="text/javascript"> 
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



            // process change password
			$(document).ready(function() {
				$('form[id="changePassForm"]').validate({
					rules: {
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
					},
					messages: {
						password: '<span class="error">Password is 6 to 12 characters in length and contains at least 1 lower case letter, 1 upper case letter, 1 number and 1 of following characters ! @ # $ %</span>',
						confirmPass: '<span class="error">The confirm password not matching</span>',
					},
					submitHandler: function(form) {
						//use ajax to send request to server.
						var password = $('#password').val();
                        var oldPassword = $('#oldPassword').val();
						$.ajax({
							url: 'client_change_info_process.php',
							method: 'POST',
							data: {
                                oldPassword: oldPassword,
								password: password,
                                action: 'change_pass'
							},
							// get success message from server
							success: function(data) {
								if (data == 'success') {
                                    alert("Change successful!");
									location.reload();
								} else 
                                if(data == 'oldpass_wrong'){
                                    alert("current password wrong! please enter again.");
                                } else {
                                    alert("Something wrong! Please do it again.");
								}
							}
						});

					}
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
			});


           // process change info form
			$(document).ready(function() {
				$('form[id="changeInfoForm"]').validate({
					rules: {
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
					},
					messages: {
						firstName: '<span class="error">This field is required</span>',
						lastName: '<span class="error">This field is required</span>',
						email: '<span class="error">The email not valid</span>',
						phoneNumber: '<span class="error">This field is required and phone number contains only number</span>',
						postalAddress: '<span class="error">This field is required</span>',
					},
					submitHandler: function(form) {
						//use ajax to send request to server.
						var firstName = $('#firstName').val();
						var lastName = $('#lastName').val();
						var email = $('#email').val();
						var phoneNumber = $('#phoneNumber').val();
						var postalAddress = $('#postalAddress').val();
						$.ajax({
							url: 'client_change_info_process.php',
							method: 'POST',
							data: {
								firstName: firstName,
								lastName: lastName,
								email: email,
								phoneNumber: phoneNumber,
								postalAddress: postalAddress,
                                action: 'change_info'
							},
							// get success message from server
							success: function(data) {
								if (data == 'fail') {
									alert("Something wrong! Please do it again.");
								} else {
									alert("Change successful!");
									location.reload();
								}
							}
						});

					}
				});
				
			});


    </script>
</body>
</html>