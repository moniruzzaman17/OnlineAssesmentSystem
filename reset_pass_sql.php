<?php
include 'connection.php'; 
$new_pass=$_POST['n_pass'];
$email=$_POST['email'];

$sql="UPDATE student_info SET password='$new_pass' WHERE email='$email'";
if (mysqli_query($conn, $sql)) {
	echo '<script>alert("Password has been Updated!!"); window.location="login.php"</script>';
}

?>