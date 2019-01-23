<?php include '../connection.php';  ?>

<?php

$class_name=$_POST['select1'];
$sub_code=$_POST['subject_code'];
$chapter_name=$_POST['chapter_name'];

if(isset($_POST['chpater_insert_btn']))
					{
						
						//our sql statement that we will execute
						$sql= "INSERT INTO chapter(class_name, sub_code, chapter_name) VALUES('$class_name', '$sub_code', '$chapter_name')";

							if(mysqli_query($conn, $sql)) 
							{ 
								echo "<script>alert('Chapter Added Successfully!!!'); window.location='chapter_insert.php'</script>";
							}

							else {
								echo "<script>alert('Insert Failed!!!'); window.location='chapter_insert.php'</script>";
							}

							mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
			    }

?>