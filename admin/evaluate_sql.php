<?php include '../connection.php'; ?>
<?php

$user_id="ata123";

for($q=1; $q<=2; $q++){
	$sql=mysqli_query($conn, "SELECT qans FROM tb_question WHERE qid='$q'");
	$row=mysqli_fetch_array($sql);
	$given_ans=$_POST[$q];
	if($row['qans']==$given_ans){
		$sql2="INSERT INTO exam_tb(user_id, qid, given_ans, marks) VALUES('$user_id', '$q', '$given_ans', 1)";
		if (mysqli_query($conn, $sql2)) {
			echo "if done";
		}
		else{
			echo "if not";
		}
	}
	else{
		$sql1="INSERT INTO exam_tb(user_id, qid, given_ans, marks) VALUES('$user_id', '$q', '$given_ans', 0)";
		if (mysqli_query($conn, $sql1)) {
			echo "else done";
		}
		else{
			echo "else not";
		}
	}
}

?>