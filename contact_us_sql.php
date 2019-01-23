<?php
include 'connection.php'; 

// this is mail function
function send_email($email,$subject,$msg,$header)
{
  return mail($email,$subject,$msg,$header);
}
$email="ataur.214@gmail.com";

$user_name    = $_POST['user_name'];
$user_mail        = $_POST['email'];
$class        = $_POST['class'];
$text      = $_POST['subject'];


$subject="User feedback from Online Assesment System";

$message="Dear Authority, {PHP_EOL} I am {$user_name}. I am a {$class} student. {$text} {PHP_EOL} Sincerely, {PHP_EOL} {$user_name} {PHP_EOL} {$user_mail}";

$headers="From: Online Assesment";

if (send_email($email,$subject,$message,$headers)) {

  echo "<script>alert('Thank you for your feedback'); window.location='contactus.php'</script>";
}
?>