<?php include '../connection.php'; ?>
<?php
session_start();

$user=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['button']))
					{
						
						//our sql statement that we will execute
						$sql = mysqli_query($conn, "SELECT user_id, password FROM admin_info WHERE user_id = '$user' || email='$user'");
						$row = mysqli_fetch_array($sql);
							if($row["user_id"]==$user || $row["email"]==$user && $row["password"]==$password)
							{
								$_SESSION['admin_logged']=true;
								$_SESSION['current_id']=$user;

								$sql1 = mysqli_query($conn, "SELECT name FROM admin_info WHERE user_id = '$user' || email='$user'");
						       $row1 = mysqli_fetch_array($sql1);
						       $_SESSION["admin_name"]=$row1['name'];




								echo "<script>window.location='admin_home.php'</script>";
						mysqli_close($conn); //close the connection
							}
							else
							{
								$_SESSION['admin_logged']=false;
								echo "<script>alert('Incorrect User Name or Password!'); window.location='index.php'</script>";
						mysqli_close($conn); //close the connection
							}

					}

?>