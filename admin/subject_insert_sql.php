<?php include '../connection.php';  ?>

<?php

$class_insert=$_POST['class'];
$sub_code=$_POST['subject_code'];
$sub_name=$_POST['subject'];

if(isset($_POST['subject_submit_btn']))
					{
						
						//our sql statement that we will execute
						$sql= "INSERT INTO subject(class_name,sub_code,sub_name) VALUES('$class_insert','$sub_code','$sub_name')";

							if(mysqli_query($conn, $sql)) 
							{ 
								echo "<script>alert('Data Successfully Insert!!!'); window.location='subject_insert.php'</script>";
							}

							else {
								echo "<script>alert('Insert Failed!!!'); window.location='subject_insert.php'</script>";
							}

							mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
			    }

?>