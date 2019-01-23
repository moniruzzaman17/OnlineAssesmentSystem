<?php include '../connection.php';
include 'admin_header.php'; 
?>
	<style>
table, td, th {    
    border: 1px solid black;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
    font-size: 18px;
    background-color: #eaf5f2;
}

th{
	text-align: center;
}

td{
	text-align: center;
}

th, td {
    padding: 15px;
}

.activ_deactiv_btn{
	border: none;
	background-color: transparent;
	text-decoration: underline;
}

.activ_deactiv_btn:hover{
	transform: scale(1.4);
}
</style>


<div class="manage_user_body">

	<form>
		<div class="user_container">

		<h2>Manage User Pannel</h2>
		<table>
		  <tr>
		  	<th><b>SL</b></th>
		    <th><b>Name</b></th>
		    <th><b>User Name</b></th>
		    <th><b>Email</b></th>
		    <th><b>Action</b></th>
		  </tr>
		  <?php
		  $sql=mysqli_query($conn, "SELECT student_name,user_id,email FROM student_info");
		  $no=1;
		  			while ($row = mysqli_fetch_array($sql))
		  			{
		  				$u_id=$row['user_id'];

					    	$sql_check=mysqli_query($conn, "SELECT status FROM student_info WHERE user_id='$u_id'");
					    	$row_check=mysqli_fetch_array($sql_check);
					    	if ($row_check['status']==1) {
					    ?>
					   <tr>
					   	<form action="user_deactive_sql.php" method="post">
					  	<td> <?php echo $no++ ?></td>
					  	<td><?Php echo $row['student_name']; ?></td>
					    <td><?Php echo $row['user_id']; ?></td>
					    <td><?Php echo $row['email']; ?></td>
					    <td>
					    	<input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
					    	<button name="deactive_btn" class="activ_deactiv_btn" onclick="confirm('Are you Sure??')">De-Active</button>
					    </td>
					    </form>
					  </tr>
					   <?php
							}
							else{ ?>
					   <tr style="background-color: rgba(255,0,0,0.4);">
					   	<form action="user_deactive_sql.php" method="post">
					  	<td> <?php echo $no++ ?></td>
					  	<td><?Php echo $row['student_name']; ?></td>
					    <td><?Php echo $row['user_id']; ?></td>
					    <td><?Php echo $row['email']; ?></td>
					    <td>
					    	<input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
					    	<button name="active_btn" class="activ_deactiv_btn">Active</button>
					    </td>
					    </form>
					  </tr>
						<?php	} 
		  		}
		  ?>
		 
		 
		</table>
				
		</div>
	</form>
</div>