<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name "viewport" content = "width-device=width, initial-scale=1"/>
		<title>Administrator Login</title>
		<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
	</head>
<body>
	<div id="page">
<div id="header">
<h1>Administrator Login </h1>
<p align="center">&nbsp;</p>
</div>
				

			<form method = "POST" action = "login_query.php">
			<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Username</b></td>
      <td width="188">	<input type = "text" placeholder = "Username"  name = "username" class = "form-control" required = "required"/>
</td>
    </tr>
    <tr>
      <td><b>Password</b></td>
      <td>					<input type = "password" placeholder = "Password"  name = "password" class = "form-control" required = "required">
</td>
    </tr>
    <tr>
      <td></td>
      <td>									<button class = "btn btn-primary pull-left" name = "login"></span> Login</button>
</td>
    </tr>
  </table>
			</form>
			<div id="footer">
<div class="bottom_addr"></div>
		</div>
	</div>
</body>
</html>