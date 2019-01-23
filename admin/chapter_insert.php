<?php include '../connection.php';
include 'admin_header.php'; 
?>

<style>
	.chap_insert_body{
		text-align: center; width: 30%; background-color: #ddd;  margin-top: 5%; margin-left:35%;  border: 5px solid black;
		font-size: 25px; float: left; 
	}
	
	.chpater_insert_container{
		font-size: 20px;padding: 2%;
	}
	.chpater_insert_container select{
		text-align: center;
		width: 45%;
		padding: 2px;
	}
	.chpater_insert_btn{
		width: 35%;
		font-size: 25px;
		padding: 2px;
		margin: 8%;
		color: black;
		background-color: #ddd;
		border: 2px solid black;
	}
	
</style>

<div class="chap_insert_body">
	
   <form action="chapter_insert_sql.php" method="POST">
   	<h2>Chapter Insert Form</h2><br>
   	<div class="chpater_insert_container">
   Class Name:<select class="subject_name" name="select1" id="select1">

			  <option style="color: gray;" value="">Select Class</option>

		<?php 
		$sql = mysqli_query($conn, "SELECT * FROM class");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	?>

		         <option value="<?Php echo $row['class_name']; ?>"><?Php echo $row['class_name']; ?></option>

		         <?php 
		       }
		?>
		</select><br><br>

   Subject Name:<select class="subject_name" name="select2" id="select2">
			  <option style="color: gray;" value="">Select Subject</option>

		<?php 
		$sql = mysqli_query($conn, "SELECT * FROM subject");
			while ($row = mysqli_fetch_array($sql)) 
		       {
		       	?>

		         <option value="<?Php echo $row['class_name']; ?>" data-othervalue="<?Php echo $row['sub_code']; ?>"><?Php echo $row['sub_name']; ?></option>

		         <?php 
		       }
		?>
		</select><br><br>
		<input type="hidden" name="subject_code" id="otherValue">
	

<script>
	// Script for dependent Dropwown
    var $select1 = $( '#select1' ),
        $select2 = $( '#select2' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
    $select2.html( $options.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );

// script for getting other value from the option 
$('#select2').change(function () {
var otherValue=$(this).find('option:selected').attr('data-othervalue');
$('#otherValue').val(otherValue);
});

</script>

  Chapter Name:<input type="text" name="chapter_name" value=""><br><br>
  <input class="chpater_insert_btn" name="chpater_insert_btn" type="submit" value="Submit">
  </div>


</form> 
</div>
</body>
</html>			
  
