	<?php
	include 'header.php';
	include 'connection.php';
	

	if(!isset($_SESSION['logged']) && empty($_SESSION['logged'])){
		header("Location: http://localhost/project/index.php");
	}
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
	button{
		font-size: 20px;
		text-decoration: none;
		color: white;
		padding: 12px;
		text-align: center;
		margin-left: 45%;
		margin-bottom: 4%;
		margin-top: 5%;
		width: 150px;
		border-radius: 32px;
		background-color: #de5832;

	}
	button:hover{
		background-color: white;
		border: 1px solid #de5832;
		color: black;
		color: black;
	}
	h4{
		margin-left: 10%;
	}
	h1{
		text-align: center;
		margin-top: 4%;
		margin-bottom: 4%;
		border: 1px solid green;
		padding: 1%;
		margin-left: 25%;
		margin-right: 25%;
	}

	time{
		font-size: 30px; 
		color: #FF0000;
		margin-left: 80%;
		margin-top: 12%;
		padding: 8px;
		border: 2px solid #de5832;
		background-color: #CCE5FF;


	}

</style>
<?php
if (isset($_POST['ques_limit']) || !empty($_POST['ques_limit'])) {
	$ques_limit=$_POST['ques_limit'];
}
else
{
	$ques_limit=00;
}
?>


<time id="countdown"><?php echo $ques_limit; ?>:00</time>
<h2>online exam for&nbsp;:: subject name</h2>
<p id="demo"></p>
<div class="question_name">
	<ol>
		<form id="frm" action="" method="post">
			<input type="hidden" name="frm_submit" value="1">
			<?php 
			if (isset($_POST['cid'])) {
				$ques_limit=$_POST['ques_limit'];
				$chap_count=count($_POST['cid']);
				$lmt=$ques_limit/$chap_count;
				$limit = (int)$lmt;

				$remainder=$ques_limit%$chap_count;
				if ($remainder==0) {
					for ($i=0; $i < $chap_count; $i++) { 
						$c_id=$_POST['cid'][$i];
						$name=1;
						$sql=mysqli_query($conn, "SELECT * FROM tb_question WHERE chap_id='$c_id' ORDER BY RAND() LIMIT $limit");
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

					}
				}
				else
				{
					for ($i=0; $i < $chap_count; $i++) { 
						if ($i==0) {

							$qlimit=$limit+$remainder;
							$c_id=$_POST['cid'][$i];
							$name=1;
							$sql=mysqli_query($conn, "SELECT * FROM tb_question WHERE chap_id='$c_id' ORDER BY RAND() LIMIT $qlimit");
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
						}
						else
						{
							$c_id=$_POST['cid'][$i];
							$name=1;
							$sql=mysqli_query($conn, "SELECT * FROM tb_question WHERE chap_id='$c_id' ORDER BY RAND() LIMIT $limit");
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
						}

					}
				}

				?>
				<!-- foreach ($_POST['cid'] as $c_id) { -->
				<button name="fe_btn">Finish Exam</button>
			</form>
			<script type="text/javascript">
				
				var seconds = '<?php echo $ques_limit*60; ?>';
				function secondPassed() {
					var minutes = Math.round((seconds - 30)/60),
					remainingSeconds = seconds % 60;

					if (remainingSeconds < 10) {
						remainingSeconds = "0" + remainingSeconds;
					}

					document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
					if (seconds == 0) {
						clearInterval(countdownTimer);
//form1 is your form name
document.getElementById("frm").submit();
} else {
	seconds--;
}
}
var countdownTimer = setInterval('secondPassed()', 1000);
</script>

<?php

}
$user_id=$_SESSION['current_id'];
if (isset($_POST['fe_btn']) || isset($_POST['frm_submit'])) {
	foreach ($_POST['qid'] as $question_id) {
		$q=0;
		$sql=mysqli_query($conn, "SELECT qans FROM tb_question WHERE qid='$question_id'");
		$row=mysqli_fetch_array($sql);
		$cor_ans=$row['qans'];
		$cor_ans_array[]=$cor_ans;
		if (isset($_POST['q'.$question_id][$q])) {
			$given_ans= $_POST['q'.$question_id][$q];
		}
		else
		{
			$given_ans= "";
		}
		$g_ans[]=$given_ans;
		$current_date=date("Y-m-d");


		if($cor_ans==$given_ans){
			$sql2="INSERT INTO exam_tb(exam_id, user_id, qid, given_ans, correct_ans, marks, exam_date) VALUES('$test_id', '$user_id', '$question_id', '$given_ans', '$cor_ans', 1, '$current_date')";
			mysqli_query($conn, $sql2);
		}
		else{
			$sql1="INSERT INTO exam_tb(exam_id, user_id, qid, given_ans, correct_ans, marks, exam_date) VALUES('$test_id', '$user_id', '$question_id', '$given_ans', '$cor_ans', 0, '$current_date')";
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
								<h4 style="color: green;">Given Answer = <?php echo $_SESSION['given_ans'][$j]; ?> (Correct)</h4>
							<?php }
							else
								{ ?>
									<h4 style="color: red;">Given Answer = <?php echo $_SESSION['given_ans'][$j]; ?> (Wrong)</h4>
									<h4 style="color: blue;">Correct Answer = <?php echo $_SESSION['corr_ans'][$j]; ?></h4>
								<?php }
								?>
								<?php
								$j++;
							}

							?>
							<h1>Total Obtain Marks= <?php echo $marks; ?></h1>
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
								<h1>Sorry!! You Already Performed</h1>
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