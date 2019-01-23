<?php include '../connection.php';  ?>

<?php

$class=$_POST['class_name'];
$sub=$_POST['sub_code'];
$chapter=$_POST['chapter_code'];

$sql_cl=mysqli_query($conn, "SELECT class_id FROM class WHERE class_name='$class'");
$row_cl=mysqli_fetch_array($sql_cl);
$class_id=$row_cl['class_id'];


if(isset($_POST['question_insert_btn']))
					{
						$i=0;
						foreach ($_POST['ques'] as $ques) {
							$correct_ans	=	$_POST['cor_ans'][$i];
							$op1			=	$_POST['op1'][$i];
							$op2			=	$_POST['op2'][$i];
							$op3			=	$_POST['op3'][$i];
							$op4			=	$_POST['op4'][$i];


							$sql="INSERT INTO tb_question(class_id, subject_code, chap_id, qname, qans, opone, optwo, opthree, opfour) VALUES('$class_id', '$sub', '$chapter', '$ques', '$correct_ans', '$op1', '$op2','$op3', '$op4')";
						if (mysqli_query($conn, $sql)) {
							header("Location: http://localhost/project/admin/question_insert.php"); 
						}
						else
						{
							echo "Not";
						}
							$i++;
						}
							mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
			    }

?>