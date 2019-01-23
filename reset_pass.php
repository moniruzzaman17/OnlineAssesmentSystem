<?php
include 'connection.php'; 
session_start();
$main_v_code=$_SESSION['main_v_code'];
$entered_v_code=$_POST['entered_code'];

if ($main_v_code==$entered_v_code) {
  $email=$_SESSION['email']; 
  unset($_SESSION['main_v_code']);
  unset($_SESSION['email']);
  ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Online Assessment System for Academic Studies</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

  </head>
  <body style="background-color: #25283D">
    <div class="my_container">
      <div class="left">
       <img src=".\./image/1.png" style="height: 100px;">
       <h2>Enter New Password</h2>
       
       <form action="reset_pass_sql.php" method="post">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="text" name="n_pass" placeholder="Enter new password"><br>
        <button style="margin: 5% 0%;" id="newpassbtn" type="submit" name="confirm_btn" value="button">Update</button>
      </form> 

      
    </div>
    <div class="right">
    </div>
  </div>
</body>
</html>

<?php
}
else
{
  header("Location: http://localhost/project/forget_pass.php");
}
?>