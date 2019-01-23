<?php
session_start(); 
$isLoggedIn = false;
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
	$isLoggedIn = $_SESSION['logged'];
	$name=$_SESSION["username"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/appear_exam.css">
	<link rel="stylesheet" type="text/css" href="css/subject_insert.css">
	<link rel="stylesheet" type="text/css" href="css/chapter_insert.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/bootstrap.min.js"></script> 
	<script src="bootstrap/js/jquery.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>
	
		<div class="my_panel">
			<div class="panel_left">
				<p>Online assessment system for academic studies</p>
				
			</div>
			<div class="panel_right">
							        <?php 

					  if($isLoggedIn)
					    { 
					      echo '<a class="btn" href="logout_sql.php">LOGOUT</a></li>';
					    }else{
					      echo '<a class="btn" href="login.php">LOGIN</a></li>';
					      echo '<a class="btn" href="registration.php">REGISTER</a></li>';
					    }
					  ?>
  		 	 </div>
  		 </div>


			<nav style="margin-bottom: 0px;" class="navbar nav-default navc">
			  <div class="navtext">
			    <div class="navbar-header">
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="index.php">HOME</a></li>
			        <?php 
					  if($isLoggedIn)
					    { 
					    	?>
					      <li><a href="appear_exam.php"><span>APEAR EXAM</span></a></li>
					      <li><a href="result.php"><span>RESULT</span></a></li>
					      <li><a href="user_profile.php"><span><?php echo $name; ?></span></a></li>
					   <?php }
					      echo '<li><a href="registerform.html">FAQ</a></li>';
					      echo '<li><a href="contactus.php">CONTACT US</a></li>';
					      echo '<li><a href="registerform.html">ABOUT</a></li>';
					  ?>


			    </ul>
			  </div>
			</nav>