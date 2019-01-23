<?php
include '../connection.php';
include 'admin_header.php';
?>
		<style> 
		.class_insert_form{
			text-align: center; width: 30%; background-color: #ddd; margin-left: 35%; margin-top: 10%; border: 5px solid black;
		}
		.class_insert_form_container{
			font-size: 20px;padding: 5%;
		}
		button{
			width: 35%;
			color: black;
			font-size: 25px;
			border: 2px solid black;
		}

		</style>


		<div class="class_insert_form">
		<form action="class_insert_sql.php" method="POST">
			<h2>Class Insert Form</h2>
			<div class="class_insert_form_container">
				Insert Class: <input type="text" name="class_name" value="" required="#"><br><br>
				 <button name="class_insert_button" value="submit">Submit</button>
			</div>
		</form>
		</div>