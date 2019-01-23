<?php
include 'header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	table, td, th {    
		border: 1px solid black;
		text-align: left;
	}

	table {
		border-collapse: collapse;
		table-layout: fixed;
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
</style>
</head>
<body>
	
	<table>
		<tr>
			<th><b>SL</b></th>
			<th><b>Test ID</b></th>
			<th><b>Date</b></th>
			<th><b>Total Marks</b></th>
			<th><b>Obtain Marks</b></th>
		</tr>
		<?php
		$user_id=$_SESSION['current_id'];

		$result=mysqli_query($conn, "SELECT DISTINCT(exam_id) FROM exam_tb WHERE user_id='$user_id'");
		$sl=1;
		while ($row=mysqli_fetch_array($result)) {
			$exam_id=$row['exam_id'];

			$result0=mysqli_query($conn, "SELECT DISTINCT(exam_date) FROM exam_tb WHERE exam_id='$exam_id'");
			$row0=mysqli_fetch_array($result0);
			$exam_date=$row0['exam_date'];


			$result1=mysqli_query($conn, "SELECT count(marks) FROM exam_tb WHERE exam_id='$exam_id'");
			$row1=mysqli_fetch_array($result1);
			$total_marks=$row1['count(marks)'];

			$result2=mysqli_query($conn, "SELECT SUM(marks) FROM exam_tb WHERE exam_id='$exam_id'");
			$row2=mysqli_fetch_array($result2);
			$obtain_marks=$row2['SUM(marks)'];

			?>
			<tr>
				<td><?php echo $sl++; ?></td>
				<td><?php echo $row['exam_id']; ?></td>
				<td><?php echo $exam_date; ?></td>
				<td><?php echo $total_marks; ?></td>
				<td><?php echo $obtain_marks; ?></td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>