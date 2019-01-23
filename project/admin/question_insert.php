<?php include '../connection.php';
include 'admin_header.php'; 
?>

<style>
	.question_insert_body{
		text-align: center; width: 80%; background-color: #ddd;  margin-top: 2%; margin-left:5%;  border: 5px solid black;
		font-size: 25px; float: left; 
	}
	
	.question_insert_container{
		font-size: 20px;padding: 2%;
	}
	.question_insert_container select{
		text-align: center;
		width: 20%;
		padding: 2px;
	}
	.question_insert_btn{
		width: 15%;
		font-size: 25px;
		padding: 2px;
		margin: 8%;
		color: black;
		background-color: #ddd;
		border: 2px solid black;
	}
	.question_body{
		width: 60%;
		height: 310px;
		background-color: #eaf5f2;
		margin-left: 280px;
	}
	form td{
	font-size: 20px;
	}
	
</style>

<div class="question_insert_body">
	
   <form action="" method="POST">
   	<h2>question Insert Form</h2><br>
   	<div class="question_insert_container">
   Class Name:<select class="subject_name" name="select1" id="select1" required>
			  <option style="color: gray;" value="">Select Class</option>

		<?php 
		$sql = mysqli_query($conn, "SELECT class_name FROM class");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	?>

		         <option value="<?Php echo $row['class_name']; ?>"><?Php echo $row['class_name']; ?></option>

		         <?php 
		       }
		?>
		</select><br><br>

   Subject Name:<select class="subject_name" name="select2" id="select2" required>
			  <option style="color: gray;" value="">Select Subject</option>

		<?php 
		$sql = mysqli_query($conn, "SELECT sub_code, sub_name, class_name FROM subject");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	?>

		         <option value="<?Php echo $row['class_name']; ?>" data-othervalue="<?Php echo $row['sub_code']; ?>"><?Php echo $row['sub_name']; ?></option>

		         <?php 
		       }
		?>
		</select><br><br>
		<input type="hidden" name="subject_code" id="otherValue">



   Chapter Name:<select class="subject_name" name="select3" id="select3" required>
			  <option style="color: gray;" value="">Select chapter</option>

		<?php 
		$sql = mysqli_query($conn, "SELECT class_name, sub_code, chapter_name, chapter_id FROM chapter");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	?>

		         <option value="<?Php echo $row['class_name']; ?>" data-othervalue2="<?Php echo $row['chapter_id']; ?>"><?Php echo $row['chapter_name']; ?></option>

		         <?php 
		       }
		?>
		</select><br><br>
		<input type="hidden" name="chapter_code" id="otherValue2">


<script>
	// Script for dependent Dropwown
    var $select1 = $( '#select1' ),
        $select2 = $( '#select2' ),
        $select3 = $( '#select3' ),
    $options1 = $select2.find( 'option' );
    $options2 = $select3.find( 'option' );
    
$select1.on( 'change', function() {
    $select2.html( $options1.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );

$select2.on( 'change', function() {
    $select3.html( $options2.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );

// script for getting other value from the option 
$('#select2').change(function () {
var otherValue=$(this).find('option:selected').attr('data-othervalue');
$('#otherValue').val(otherValue);
});

// script for getting other value from the option 
$('#select3').change(function () {
var otherValue2=$(this).find('option:selected').attr('data-othervalue2');
$('#otherValue2').val(otherValue2);
});

</script>
  </div>

  Number of Question: <input type="number" name="limit" value="1" max="50" min="1">
  <button name="go">GO</button>
  <a href="question_insert.php">Refresh</a>
</form> 
<br>
<br>
<br>
<!-- question insert sql form -->
<form action="question_inser_sql.php" method="post">
<?php
if (isset($_POST['go'])) {

$class_name=$_POST['select1'];
$sub_code=$_POST['subject_code'];
$chapter_code=$_POST['chapter_code'];
$limit=$_POST['limit'];

echo "Class name: ".$class_name;
echo "<br>";
echo "Subject: ".$sub_code;
echo "<br>";
echo "chapter_id: ".$chapter_code;
echo "<br>";


	for ($i=1; $i <= $limit; $i++) {  ?>
		  <label>Question</label>
  <div class="question_body">
<input type="hidden" name="class_name" value="<?php echo $class_name; ?>">
<input type="hidden" name="sub_code" value="<?php echo $sub_code; ?>">
<input type="hidden" name="chapter_code" value="<?php echo $chapter_code; ?>">
  	<!-- question item -->
  	<div class="question_name">

       <td><?php echo $i; ?>. question name<input style="width: 50%; margin-left: 25%; padding: 5%;" type="text" name="ques[]" class="form-control" /></td>

         	<table class="table table-bordered my_table">
			<tr>
	           <td>Option one<input type="text" name="op1[]" class="form-control"></td>
	           <td>Option two<input type="text" name="op2[]" class="form-control" ></td>
	           <td>Option three<input type="text" name="op3[]" class="form-control"></td>
	           <td>Option four<input type="text" name="op4[]" class="form-control"></td>
	        </tr>
    	</table>
        	 Right Answer<input style="width: 50%; margin-left: 25%; padding: 2%;" type="text" name="cor_ans[]" class="form-control" />

  	</div>
  	
  </div>

	<?php	
	}
	?>

  <input class="question_insert_btn" name="question_insert_btn" type="submit" value="Submit">
	<?php
}
?>
</form>
</div>
</body>
</html>			
  
