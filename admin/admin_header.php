<?php
session_start();
if (isset($_SESSION['admin_logged']) || !empty($_SESSION['admin_logged'])) {

}
else{
	header("Location: http://localhost/project/admin/");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin home</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>
	
		<div class="my_panel">
			<div class="panel_left">
				<p>Online assessment system for academic studies</p>
				
			</div>
			<div class="panel_right">
							         
					     <a class="btn" href="logout_sql.php">LOGOUT</a></li>
					    					  
  		 	 </div>
  		 </div>

			<nav class="navbar nav-default navc" >
			  <div class="navtext" style="color: white;">
			    <div class="navbar-header">
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="admin_home.php">Home</a></li>
			      <li class="active"><a href=""><?php echo $_SESSION["admin_name"]; ?></a></li>
			    
					      <li><a href="manage_user.php"><span>Manage User</span></a></li>					      					
					      <li><a href="class_insert.php">Add Class</a></li>
					      <li><a href="subject_insert.php">Add Subject</a></li>
					      <li><a href="chapter_insert.php">Add chapter</a></li>
					      <li><a href="question_insert.php">Add Ques</a></li>
					      <li><a href="">Ques List</a></li>
					      
					  
			    </ul>
			  </div>
			</nav>