<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name "viewport" content = "width-device=width, initial-scale=1"/>
		<title>User Registration</title>
	</head>
<body>
	
	<br />
	<br />
	<br />
	<div class = "row">
		<div class = "col-md-4">
		</div>
		<div class = "col-md-4 well">
			<h4 class = "text-danger">User Registration</h4>
			<hr style = "border-top:1px dotted #000;"/>
			<form method = "POST" action = "save_query.php">
				<div class="form-group">
					<input type = "text" placeholder = "Username"  name = "username" class = "form-control"/>
				</div>
				<div class="form-group">
					<input type = "password" placeholder = "Password"  name = "password" class = "form-control">
				</div>
				<div class="form-group">
					<input type = "text" placeholder = "Firstname"  name = "firstname" class = "form-control"/>
				</div>
				<div class="form-group">
					<input type = "text" placeholder = "Lastname"  name = "lastname" class = "form-control"/>
				</div>
				<button class = "btn btn-success" name = "signup"> Sign up</button>
			</form>
		</div>
	</div>
</body>
</html>