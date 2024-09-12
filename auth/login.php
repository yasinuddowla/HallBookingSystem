<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | Convention Hall Booking System</title>
	<?php require_once __DIR__ . '/../includes/templates/resources.php'; ?>
</head>

<body>
	<div class="container my-5 w-50">
		<h2 class="mb-3">Login</h2>
		<form id="loginForm" method="post">
			<div id="loginMessage" class="text-danger my-2"></div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" id="username" name="username" class="form-control">
			</div>
			<div class="form-group mt-4">
				<label>Password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			<div class="form-group mt-3">
				<input type="submit" class="btn btn-primary" value="Login">
			</div>
		</form>

	</div>

	<script>
		$(document).ready(function() {
			$("#loginForm").on("submit", function(event) {
				event.preventDefault(); // Prevent form from submitting the traditional way

				$.ajax({
					url: 'check.php',
					type: 'POST',
					data: $(this).serialize(), // Serialize form data
					dataType: 'json',
					success: function(response) {
						if (response.success) {
							// Redirect to welcome page or home page
							window.location.href = '../index.php';
						} else {
							// Show error message
							$("#loginMessage").text(response.message).addClass("error");
						}
					},
					error: function() {
						$("#loginMessage").text("An error occurred. Please try again.").addClass("error");
					}
				});
			});
		});
	</script>
</body>

</html>