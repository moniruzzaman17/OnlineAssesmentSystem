<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>regitration page</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/registation.css">
</head>
<body>
	<div class="my_container">
		<form action="registration_sql.php" method="post">

			<div class="left">
				<h2>REGISTRATION HERE</h2>
				
				<table>
					<tr>
						<td>
							STUDENT NAME
						</td>
						<td>
							USER ID
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="student_name" pattern="^[A-Z][ a-zA-Z]+$" title="First Letter must be upper case and only space and characters are allowed" value="" placeholder="student name" required>
						</td>
						<td>
							<input type="text" name="user_id" pattern="^[a-z][a-z_]{1,20}[0-9]{1,15}$" title="start with at least 2 lower case and end with number, allowed only" value="" placeholder="user id" required>
						</td>
					</tr>
					<tr>
						
						<td>
							EMAIL ADDRESS
						</td>
						<td>
							PHONE NUMBER
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="email" pattern="^[a-zA-Z0-9 .@#$%&*]{6,30}$" value="" placeholder="Email Address" required>
						</td>
						<td>
							<input type="text" name="phone" pattern="^(?:\+?88)?01[15-9]\d{8}$" value="" placeholder="Phone Number" required>
						</td>
					</tr>
					<tr>
						<td>
							PASSWORD
						</td>
						<td>
							INSTITUE NAME
						</td>
					</tr>

					<tr>
						<td>
							<input type="password" name="password" value="" placeholder="Password" required>
						</td>
						<td>
							<input type="text" name="ins_name" value="" placeholder="INSTITUE NAME" required>
						</td>
					</tr>
					<tr>
						<td>
							Class Name
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="class_name" value="" placeholder="Class Name" required>
						</td>
					</tr>
				</table>
				
				<button class="btn" name="button">REGISTRATION NOW</button>
				
				
			</div>
		</form>
		<div class="right">
			<h1>Already Registered?</h1>
			<a class="btn" href="login.php">LOGIN</a>
		</div>
	</div>
	
</body>
</html>