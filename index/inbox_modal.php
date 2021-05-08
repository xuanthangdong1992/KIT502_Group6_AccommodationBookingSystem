<!DOCTYPE html>
<html>
<head>
</head>
<body>
<!-- Login Modal -->
<div class="modal fade" id="inboxModal" tabindex="-1" role="dialog" aria-labelledby="inboxModalLabel" aria-hidden="true">
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
	
</body>
</html>