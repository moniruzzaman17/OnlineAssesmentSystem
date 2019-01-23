<?php 
include 'header.php';

unset($_SESSION['ques_id']);
unset($_SESSION['ques']);
unset($_SESSION['op1']);
unset($_SESSION['op2']);
unset($_SESSION['op3']);
unset($_SESSION['op4']);
unset($_SESSION['given_ans']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<style>
	body {font-family: Arial, Helvetica, sans-serif;}
	* {box-sizing: border-box;}

	input[type=text], select, textarea {
		width: 100%;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top: 6px;
		margin-bottom: 16px;
		resize: vertical;
	}

	input[type=submit] {
		background-color: #de5832;
		color: white;
		padding: 12px 20px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		font-size: 20px;
	}

	input[type=submit]:hover {
		color: black;
		background-color: #ffff;
		border: 1px solid #de5832;
	}

	.container {
		margin-top: 5%;
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
		width: 40%;
		text-align:left;
	}
	
	.contactus_description{
		margin-left: 30%;
		margin-top: 5%;
		width: 40%;
		text-align: justify;


	}


</style>

</head>



<body>
	<div class="contactus_body">
		<div class="contactus_description">
			<h1>Have questions?<br>
			Shoot us an Email.</h1>
			<p style="font-size: 20px;">Do you have question? Do you want a custom feature or  a custom tool especially for you? A whitelable quiztool or learning management system? Just send us an email with the form below</p>
		</div>

		
		<div class="container">
			<h3 style="padding-bottom: 5%;">Contact Us</h3>
			<form action="contact_us_sql.php" method="post">
				<label for="fname">Full Name</label>
				<input type="text" id="fname" name="user_name" placeholder="Your name.." required="name can not be blanked">

				<label for="lname">GMAIL</label>
				<input type="text" id="lname" name="email" placeholder="Your Email Address.." required="">

				<label for="country">Class</label>
				<select id="country" name="class">
					<option value="JSC">JSC</option>
					<option value="PSC">PSC</option>
					<option value="SSC">SSC</option>
				</select>

				<label for="subject">Subject</label>
				<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required=""></textarea>

				<input type="submit" value="Submit">
			</form>
		</div>


	</div>
</body>
</html>