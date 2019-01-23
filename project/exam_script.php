	<?php
	include 'header.php';
	include 'connection.php';
	$test_id="test".rand(1,3000);

	?>
	<style>
		h2{
		font-size: 25px;
		padding-top:3%;
		margin-left: 10%;
		margin-right: 10%;
		border-bottom: 1px solid #ddd;
	}
	.question_name ol li{

		font-size: 22px;
		padding-top:3%;
		margin-left: 10%;
		margin-right: 10%;
		border-bottom: 1px solid #ddd;

	}
	.question_name input{
		font-size: 25px;
		margin-top:1%;
		margin-left: 10%;
		margin-right: 1.5%;

	}
	label{
		font-size: 20px;
		font-weight: normal;
	}
	</style>

	<h2>online exam for&nbsp;:: subject name</h2>
	<p id="demo"></p>
	<div class="question_name">
	     <ol>
				<form id="frm" action="" method="post">

<?php 
if (isset($_POST['cid'])) {
	$ques_limit=$_POST['ques_limit'];
foreach ($_POST['cid'] as $c_id) {
				$name=1;
				$sql=mysqli_query($conn, "SELECT * FROM tb_question WHERE chap_id='$c_id' ORDER BY RAND() LIMIT $ques_limit");
				while ($row=mysqli_fetch_array($sql)) {
				?>
	  <li><?php echo $row['qname']; ?></li>
	  <?php $_SESSION['ques'][]= $row['qname']; ?>
	  <?php $_SESSION['ques_id'][]= $row['qid']; ?>
					 <div>
					 	<input type="hidden" name="qid[]" value="<?php echo $row['qid']; ?>">
					  <input type="radio" name="q<?php echo $row['qid']; ?>[]" value="<?php echo $row['opone']; ?>" required>
					  <label for="op1">A.&nbsp;&nbsp;<?php echo $row['opone']; ?></label>
					  <?php $_SESSION['op1'][]= $row['opone']; ?>

					  <input type="radio" name="q<?php echo $row['qid']; ?>[]" value="<?php echo $row['optwo']; ?>" required>
					  <label for="op2">B.&nbsp;&nbsp;<?php echo $row['optwo']; ?></label>
					  <?php $_SESSION['op2'][]= $row['optwo']; ?>

					  <input type="radio" name="q<?php echo $row['qid']; ?>[]" value="<?php echo $row['opthree']; ?>" required>
					  <label for="op3">C.&nbsp;&nbsp;<?php echo $row['opthree']; ?></label>
					  <?php $_SESSION['op3'][]= $row['opthree']; ?>

					  <input type="radio" name="q<?php echo $row['qid']; ?>[]" value="<?php echo $row['opfour']; ?>" required>
					  <label for="op4">D.&nbsp;&nbsp;<?php echo $row['opfour']; ?></label>
					  <?php $_SESSION['op4'][]= $row['opfour']; ?>
					</div>
					<br>
					<?php 
				}
				?>
<?php
}
?>
				<button name="fe_btn">Finish Exam</button>
				</form>

			<?php

}
					$user_id=$_SESSION['current_id'];
				if (isset($_POST['fe_btn'])) {
						foreach ($_POST['qid'] as $question_id) {
						$q=0;
						$sql=mysqli_query($conn, "SELECT qans FROM tb_question WHERE qid='$question_id'");
						$row=mysqli_fetch_array($sql);
						$cor_ans=$row['qans'];
						$cor_ans_array[]=$cor_ans;
						$given_ans= $_POST['q'.$question_id][$q];
						$g_ans[]=$given_ans;


							if($cor_ans==$given_ans){
								$sql2="INSERT INTO exam_tb(exam_id, user_id, qid, given_ans, correct_ans, marks) VALUES('$test_id', '$user_id', '$question_id', '$given_ans', '$cor_ans', 1)";
								mysqli_query($conn, $sql2);
							}
							else{
								$sql1="INSERT INTO exam_tb(exam_id, user_id, qid, given_ans, correct_ans, marks) VALUES('$test_id', '$user_id', '$question_id', '$given_ans', '$cor_ans', 0)";
								mysqli_query($conn, $sql1);
							}
						$q++;
					} //END of foreach loop
					$_SESSION['given_ans']=$g_ans;
					$_SESSION['corr_ans']=$cor_ans_array;

								// $sql=mysqli_query($conn, "SELECT * FROM tb_question, exam_tb WHERE exam_tb.user_id='$user_id' AND tb_question.qid=exam_tb.qid");
								// while ($row=mysqli_fetch_array($sql)) {
									$j=0;
						if (isset($_SESSION['ques'])) {
										$marks=0;		
								foreach ($_SESSION['ques'] as $ques) {
									$qid=$_SESSION['ques_id'][$j];
								 ?>
					  <li><?php echo $ques; ?></li>
									 <div>
									  <input type="radio" name="" value="" >
									  <label for="op1">A.&nbsp;&nbsp;<?php echo $_SESSION['op1'][$j]; ?></label>

									  <input type="radio" name="" value="" >
									  <label for="op2">B.&nbsp;&nbsp;<?php echo $_SESSION['op2'][$j]; ?></label>

									  <input type="radio" name="" value="" >
									  <label for="op3">C.&nbsp;&nbsp;<?php echo $_SESSION['op3'][$j]; ?></label>

									  <input type="radio" name="" value="" >
									  <label for="op4">D.&nbsp;&nbsp;<?php echo $_SESSION['op4'][$j]; ?></label>
									</div>
									<br>
										<?php
										if ($_SESSION['corr_ans'][$j]==$_SESSION['given_ans'][$j]) { 
										$marks=$marks+1;
											?>
										<h3 style="color: green;">Given Answer = <?php echo $_SESSION['given_ans'][$j]; ?> (Correct)</h3>
										<?php }
										else
										{ ?>
										<h3 style="color: red;">Given Answer = <?php echo $_SESSION['given_ans'][$j]; ?> (Wrong)</h3>
										<h3 style="color: blue;">Correct Answer = <?php echo $_SESSION['corr_ans'][$j]; ?></h3>
										<?php }
										?>
								<?php
								$j++;
							}

							?>
<h1>Total Marks= <?php echo $marks; ?></h1>
							<?php

							unset($_SESSION['ques_id']);
							unset($_SESSION['ques']);
							unset($_SESSION['op1']);
							unset($_SESSION['op2']);
							unset($_SESSION['op3']);
							unset($_SESSION['op4']);
							unset($_SESSION['given_ans']);

}
else
{ ?>
	<h1>Sorry, You Already Performed</h1>
<?php
}
				} //END of isset button
			?>

		</ol>
	</div>

<!-- 	<script>
// Set the date we're counting down to
var countDownDate = new Date("Dec 4, 2018 15:43:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance <= 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Thank you for your attention. Time is Fnished";
   // document.getElementById("frm").submit();
  }
}, 1000);

</script> -->