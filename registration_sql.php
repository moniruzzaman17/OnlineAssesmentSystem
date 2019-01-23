<?php include 'connection.php'; ?>

<?php
$name=$_POST['student_name'];
$user_id=$_POST['user_id'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$ins_name=$_POST['ins_name'];
$class_name=$_POST['class_name'];


if(isset($_POST['button']))
{
//for insertion the user data into database
	$sql= "INSERT INTO student_info(student_name, user_id, password, email, phone,ins_name,class_name) VALUES('$name', '$user_id', '$password', '$email', '$phone', '$ins_name','$class_name')";

	if(mysqli_query($conn, $sql)) 
	{ 
		echo "<script>alert('You are Successfully Registered!!!'); window.location='login.php'</script>";
	}

	else {
		echo "<script>alert('Registration Failed!!!'); window.location='registration.php'</script>";
	}

	mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
}
?>
