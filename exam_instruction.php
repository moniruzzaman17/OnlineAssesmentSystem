<?php
include 'header.php';
include 'connection.php';


if(!isset($_SESSION['logged']) && empty($_SESSION['logged'])){
	header("Location: http://localhost/project/index.php");
}
?>
<style>
h2{
	font-size: 25px;
	padding-top:3%;
	margin-left: 10%;
	margin-right: 10%;
	border-bottom: 1px solid #ddd;
}
.exam_rules ul li{
	font-size: 20px;
	margin-left: 10%;
	padding: .75%;

	list-style-type:square;

}
.exam_rules{
	margin-top: 2%;
}
h3{
	margin-left: 40%;
	margin-top: 2%;
}
.qnumber select {
	
	margin-left: 45%;
	font-size: 20px;
	text-align: center;
	border: 2px solid #de5832;
	padding: .75%;

}

.start_exam{
	margin-top: 0%;
	margin-bottom: 3%;
}
.start_exam button
{
	font-size: 20px;
	text-decoration: none;
	color: white;
	padding: 12px;
	text-align: center;
	margin-left: 45%;
	width: 150px;
	border-radius: 22px;
	background-color: #de5832;
}
.start_exam button:hover{
	background-color: white;
	border: 1px solid #de5832;
	color: black;
	color: black;

}
.exam_instruction_footer{
	border-bottom: 1px solid #ddd;
	border-top: 1px solid #ddd;
	text-align: center;
	padding: 15px;
	font-size: 15px;
}	

</style>
<?php
$user_id		=	$_POST['user_id'];
$class_name		=	$_POST['class_name'];
$subject 	 	=	$_POST['subject'];
$subject_code	=	$_POST['subject_code'];
// $chapter_id		=	$_POST['chapter_id'];

// $chapter_id = $_POST['c_id'];
// echo $_POST['c_id'];
?>
<h2>online exam for&nbsp;:: <?php echo $subject; ?></h2>

<?php
$result1=mysqli_query($conn, "SELECT count(qid) FROM tb_question");
$row1=mysqli_fetch_array($result1);
$total_ques=$row1['count(qid)'];
?>

<form action="exam_script.php" method="post">
	<h3>Select Number of Question</h3>
	<div class="qnumber">
		<select name="ques_limit">
			<option>Select one</option>
			<option value="5">5</option>
			<option value="20">20</option>
			<option value="25">25</option>
			<option value="30">30</option>
		</select>
	</div>

	<div class="exam_rules">
		<ul>
			<li>Total number of questions :<b>20</b>.</li>
			<li>Time alloted :<b>20</b> minutes.</li>
			<li>Each question carry 1 mark.</li>
			<li>No negative marks.</li>
			<li>DO NOT refresh the page.</li>
			<li>All the best :-).</li>
		</ul>
	</div>
	<div class="start_exam">
		<?php 
		if (isset($_POST['cid'])) {
	# code...
			foreach ($_POST['cid'] as $c_id) { ?>
				<input type="hidden" name="cid[]" value="<?php echo $c_id; ?>">
			<?php }

		}
		else
		{
			echo '<script>alert("You did not select the chapter");  window.location="appear_exam.php"</script>';
		}
		?>
		<button name="se_btn">Start Exam</button>
	</div>

</form>


<div class="exam_instruction_footer">
	<p>© 2018 by online assessmnent system for academic studies. All Rights Reserved.<a href="">|copy right|</a><a href="">Terms of Use & Privacy Policy</a> </p>
</div>