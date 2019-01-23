<?php include '../connection.php'; ?>
<?php

$user_id=$_POST['u_id'];
if (isset($_POST['deactive_btn'])) {
	mysqli_query($conn,"UPDATE student_info SET status=0 WHERE user_id='$user_id'");
}
else if(isset($_POST['active_btn'])){
	mysqli_query($conn,"UPDATE student_info SET status=1 WHERE user_id='$user_id'");

}
else
{
	echo "no";
}

header("Location: http://localhost/project/admin/manage_user.php");

?>