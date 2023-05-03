<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login &amp; Register Page</title>
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

		.btn-success {
			background-color: #3c763d;
			border-color: #3c763d;
		}

		.btn-success:hover {
			background-color: #2e6c2f;
			border-color: #2e6c2f;
		}

		.form-control:focus {
			border-color: #3c763d;
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
						<h3 class="panel-title">Login</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd">
							</div>
							<div class="checkbox">
								<label><input type="checkbox"> Remember me</label>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Submit</button>
							<p>Don't have an account? <a href="register.php">Register now</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
</body>

</html>