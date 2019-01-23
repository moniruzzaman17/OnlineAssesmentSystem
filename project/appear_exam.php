
	<?php
	include 'connection.php';
	include 'header.php'
	?>
	<link rel="stylesheet" type="text/css" href="css/appear_exam.css">
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Appar Exam</title>
	</head>
	<body>
		<?php 
		$sql_uid=mysqli_query($conn, "SELECT user_id FROM student_info WHERE student_name='$name'");
		$row_uid=mysqli_fetch_array($sql_uid);
		$user_id=$row_uid['user_id'];
		 ?>
		<!-- start image slider section -->
		<div class="body_top">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox" style=" width:100%; height: 500px !important;">
	    <div class="item active">
	      <img style=" width:100%; height: 500px;" src="image/7.jpg" alt="Los Angeles">
	    </div>

	    <div class="item">
	      <img style=" width:100%; height: 500px;" src="image/5.jpg" alt="Chicago">
	    </div>

	    <div class="item">
	      <img style=" width:100%; height: 500px;" src="image/11.jpg" alt="New York">
	    </div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

		</div>
	<!-- end image slider sention -->


	<?php 
	$sql = mysqli_query($conn, "SELECT class_name FROM class ");

		while ($row = mysqli_fetch_array($sql)) {
			$class_name=$row['class_name'];
	?>
	<div class="exam_body_middle">
		<div class="class_name"><span>Subject for <?php echo $row['class_name']; ?></span></div>				

	<?php 
	$sql1 = mysqli_query($conn, "SELECT * FROM subject WHERE class_name='$class_name'");

		while ($row1 = mysqli_fetch_array($sql1)) {
			$sub_id=$row1['sub_code'];
			$sub_name=$row1['sub_name'];
	?>
		<div class="sub_container" style="float: left; width: 20%; margin-left: 4%;">
			<div class="sub_name"><?php echo $row1['sub_name']; ?></div>
		<form action="exam_instruction.php" method="post">
			
			<div class="chapter_name" style=""> 
				<?php 
				$sql2 = mysqli_query($conn, "SELECT * FROM chapter WHERE sub_code='$sub_id' && class_name='$class_name' ");

					while ($row2 = mysqli_fetch_array($sql2)) {
				?>
				<ul>
						<input type="checkbox" name="cid[]" value="<?php echo $row2['chapter_id']; ?>">
						<a href=""><?php echo $row2['chapter_name']; ?></a>
				</ul>
				<?php 
				} 
				?>
			
			</div>
		    <div class="submit_button">

		    	<?php
		    	// if (isset($_POST[$chapter_id])) {
		    	//  	echo "Selected";
		    	 // } 
		    	?>
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<input type="hidden" name="class_name" value="<?php echo $row['class_name']; ?>">
				<input type="hidden" name="subject" value="<?php echo $sub_name; ?>">
				<input type="hidden" name="subject_code" value="<?php echo $row1['sub_code']; ?>">
				<button name="go">Go</button>		
			</div>

		</form>	
		</div> <!--END of sub container-->
		<?php 
		}
		?>
	</div> <!--END of body_middle-->
	<?php 
	} 
	?>
	<div class="footer">
	<p>(C) 2018 Online Assessment System, All rights reserved.</p>
	</div>
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</body>
	</html>