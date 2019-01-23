<?php include '../connection.php';  ?>

<?php

$Class_insert=$_POST['class_name'];

if(isset($_POST['class_insert_button']))
					{
						
						//our sql statement that we will execute
						$sql= "INSERT INTO class(class_name) VALUES('$Class_insert')";

							if(mysqli_query($conn, $sql)) 
							{ 
								echo "<script>alert('Data Successfully Insert!!!'); window.location='class_insert.php'</script>";
							}

							else {
								echo "<script>alert('Insert Failed!!!'); window.location='class_insert.php'</script>";
							}

							mysqli_close($conn);

							//header("Location: http://localhost/MCCMS/signup.php"); 
			    }

?>