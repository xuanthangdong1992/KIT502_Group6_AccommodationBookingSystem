<!DOCTYPE html>
<html>
<head>
</head>
<body>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- login form -->
					<button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Login</h1>
					<form id="loginForm">
						<!-- <form id="loginForm" action="login_process.php" method="post"> -->
						<div class="form-group required">
							<label class="label-control">Username:</label>
							<input class="form-control" type="text" id="loginUsername" name="loginUsername" />
						</div>
						<div class="form-group required">
							<label class="label-control">Password:</label>
							<input class="form-control" type="password" id="loginPass" name="loginPass" />
						</div>
						<div class="submit-button">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Login Modal -->
	<!-- Register Modal -->
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
		<!-- End Register Modal -->
</body>
</html>