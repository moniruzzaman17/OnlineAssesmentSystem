<?php include '../connection.php'; 
include 'admin_header.php'
?>
<style>
	.sub_insert_body{
		text-align: center; width: 30%; background-color: #ddd;  margin-top: 7%; margin-left:15%; margin-right:3%;  border: 5px solid black;
		font-size: 25px; float: left; 
	}
	.sub_insert_dashbord{
		text-align: center; width: 30%; background-color: #ddd;  margin-top: 7%; border: 5px solid black;
		font-size: 25px; float: left;
	}
	.subject_insert_container{
		font-size: 20px;padding: 2%;
	}
	.subject_insert_container select,input{
		text-align: center;
		width: 45%;
		padding: 2px;
	}
	.btn{
		width: 35%;
		font-size: 25px;
		padding: 2px;
		margin: 8%;
		color: black;
		background-color: #ddd;
		border: 2px solid black;
	}
	.sub_insert_dashbord label{
		font-weight: normal;
		font-size: 15px;

	}


</style>

<div class="sub_insert_body">
	 
   <form action="subject_insert_sql.php" method="POST">
   	<h2> Subject Insert Form</h2><br>

   	<div class="subject_insert_container">
		   Class Name:<select name="class" class="subject_name">
					  <option value="">Select One</option>

				<?php 
				$sql = mysqli_query($conn, "SELECT class_name FROM class");
					while ($row = mysqli_fetch_array($sql)) 
				       {
				       	?>

				         <option value="<?Php echo $row['class_name']; ?>"><?Php echo $row['class_name']; ?></option>

				         <?php 
				       }
				?>
				</select><br><br>
		  Subject Name:<input type="text" name="subject" value=""><br><br>
		  Subject code:<input type="text" name="subject_code" value=""><br><br>
		  <input class="btn" type="submit" name="subject_submit_btn" value="Submit">
		  </div>
	</form> 
</div>
<div class="sub_insert_dashbord">
	<label>	
		<h2>Subject Already Inserted</h2><br>
		<?php 
		$sql = mysqli_query($conn, "SELECT sub_name FROM subject");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	echo $row['sub_name']; ?> <br>
		         <?php 
		       }
		?>
	</label>
</div>
</body>
</html>	