<?php
session_start();

if(!isset($_SESSION['logged']) && empty($_SESSION['logged'])){
	header("Location: http://localhost/project/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/user_home.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
	<div class="my_panel">
		<div class="panel_left">
			<p>Online assessment system for academic studies</p>
			
		</div>
		<div class="panel_right">
			<a class="btn" href="hometry.php">LOGOUT</a>
		</div>
	</div>


	<nav class="navbar nav-default navc">
		<div class="navtext">
			<div class="navbar-header">
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="user_home.php">HOME</a></li>
				<li><a href="#">APPEAR EXAM</a></li>
				<li><a href="#">RESULT</a></li>
				<li><a href="#">PROFILE</a></li>
			</ul>
		</div>
	</nav>
	<h1>This is Exam Page</h1>
</body>

</html>
