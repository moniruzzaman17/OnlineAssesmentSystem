<?php include 'connection.php'; ?>
<?php
session_start();

$user=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['button']))
					{
						
						//our sql statement that we will execute
						$sql = mysqli_query($conn, "SELECT user_id, password, status FROM student_info WHERE user_id = '$user'");
						$row = mysqli_fetch_array($sql);
							if($row["user_id"]==$user && $row["password"]==$password)
							{
								if ($row['status']==1) {
								$_SESSION['logged']=true;
								$_SESSION['current_id']=$user;

								$sql1 = mysqli_query($conn, "SELECT student_name FROM student_info WHERE user_id = '$user'");
						       $row1 = mysqli_fetch_array($sql1);
						       $_SESSION["username"]=$row1['student_name'];




								echo "<script>window.location='index.php'</script>";
						mysqli_close($conn); //close the connection
							}
							else{
								echo "<script>alert('Sorry! You are Suspended by the Authority'); window.location='login.php'</script>";
							}
							}
							else
							{
								$_SESSION['logged']=false;
								echo "<script>alert('Incorrect User Name or Password!'); window.location='login.php'</script>";
						mysqli_close($conn); //close the connection
							}

					}

?>