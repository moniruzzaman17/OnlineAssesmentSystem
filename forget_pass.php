<?php
include 'connection.php'; 
session_start();

// this is mail function
function send_email($email,$subject,$msg,$header)
{
  return mail($email,$subject,$msg,$header);
}

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
     <h2>Follow the step for Rest your password</h2>
     
     <form action="" method="post">
      <input type="text" name="email" placeholder="User Name or E-mail"><br>
      <input type="hidden" name="main_v_code" value="<?php echo rand(); ?>">
      <button style="margin: 5% 0%;" id="newpassbtn" type="submit" name="get_code" value="button">Get Code</button>
      <?php
      if (isset($_POST['get_code'])) { 
        $found        = false;
        $email        = $_POST['email'];
        $_SESSION['email']=$email;
        $main_v_code  = $_POST['main_v_code'];
        $_SESSION['main_v_code']=$main_v_code;

        $sql=mysqli_query($conn, "SELECT email from student_info");
        while ($row=mysqli_fetch_array($sql)) {
          if($row['email']==$email)
          {
            $found=true;
          }
        }
        if ($found==true) {

          $subject="Rest Password Verificaiton Code from Online Assesment";

          $message="Your Passwor reset Verificaiton code is: {$main_v_code}";

          $headers="From: Online Assesment";

          if (send_email($email,$subject,$message,$headers)) {
            echo "<br>";
            echo "Mail has been send!! check your email and Enter the verification code below";
          }
        }
        else
        {
          echo '<script>alert("your mail address not matched with registered info");</script>';
        }
      }
      ?>
    </form> 
    <form action="reset_pass.php" method="post">
      
      <input type="text" name="entered_code" placeholder="Enter your Verificaiton Code"><br>
      <button style="margin: 5% 0%;" id="newpassbtn" type="submit" name="confirm_btn" value="button">Continue</button>
    </form>

    
  </div>
  <div class="right">
  </div>
</div>
</body>
</html>