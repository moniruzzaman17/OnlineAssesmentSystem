<?php include '../connection.php'; ?>
<?php

$user_id="ata123";
$length=count($_POST['qid']);

// for($q=0; $q<$length; $q++){
// 	$qid=$_POST['qid'][$q];
// 	// $option="q".$qid;
// 	$sql=mysqli_query($conn, "SELECT qans FROM tb_question WHERE qid='$qid'");
// 	$row=mysqli_fetch_array($sql);
// 	$given_ans=$_POST['q'.$q][$q];
// 	echo $given_ans;
// 	echo $qid;
// 	echo $row['qans'];
// 	echo "<br>";

	foreach ($_POST['qid'] as $question_id) {
		$q=0;
		$sql=mysqli_query($conn, "SELECT qans FROM tb_question WHERE qid='$question_id'");
		$row=mysqli_fetch_array($sql);
		$cor_ans=$row['qans'];
		$given_ans= $_POST['q'.$question_id][$q];


			if($cor_ans==$given_ans){
				$sql2="INSERT INTO exam_tb(user_id, qid, given_ans, correct_ans, marks) VALUES('$user_id', '$question_id', '$given_ans', '$cor_ans', 1)";
				mysqli_query($conn, $sql2);
			}
			else{
				$sql1="INSERT INTO exam_tb(user_id, qid, given_ans, correct_ans, marks) VALUES('$user_id', '$question_id', '$given_ans', '$cor_ans', 0)";
				mysqli_query($conn, $sql1);
			}
		$q++;
	}


// }

?>