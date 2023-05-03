<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {
			background: #f2f2f2;
		}

		.panel-default {
			border-color: #ddd;
		}

		.panel {
			margin-top: 50px;
		}

		.btn-primary {
			background-color: #337ab7;
			border-color: #2e6da4;
		}

		.btn-primary:hover {
			background-color: #286090;
			border-color: #204d74;
		}

		.form-control:focus {
			border-color: #337ab7;
			box-shadow: none;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Register</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="name">
							</div>
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd">
							</div>
							<div class="form-group">
								<label for="pwd2">Confirm Password:</label>
								<input type="password" class="form-control" id="pwd2">
							</div>
							<button type="submit" class="btn btn-primary btn-block">Register</button>
							<p>Already have an account? <a href="login.php">Login now</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>