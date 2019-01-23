<?php include 'connection.php'; ?>
<?php

$value=$_POST['update_name'];
$user_id=$_POST['user_id'];
$col=$_POST['column_name'];
mysqli_query($conn,"UPDATE student_info SET $col='$value' WHERE user_id='$user_id'");

header("Location: http://localhost/project/user_profile.php");

?>