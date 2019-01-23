
<?php
include 'connection.php';
include 'header.php';

unset($_SESSION['ques_id']);
unset($_SESSION['ques']);
unset($_SESSION['op1']);
unset($_SESSION['op2']);
unset($_SESSION['op3']);
unset($_SESSION['op4']);
unset($_SESSION['given_ans']);

if(!isset($_SESSION['logged']) && empty($_SESSION['logged'])){
  header("Location: http://localhost/project/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {font-family: Arial;}

  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    margin-left: 25px;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 20px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    margin-left: 25px;
  }

  /* Style the close button */
  .topright {
    float: right;
    cursor: pointer;
    font-size: 28px;
  }

  .topright:hover{color: red;}
  tr{
  }

  h2,p{
    margin:25px;

  }
  table{
    background-color: #f1f1f1;

  }
  table tr{
    border-bottom: 1px solid #dcc5c5;
    border-left: 5px solid green;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
  }
  table td{
    padding: 15px;
    text-align: left;
  }
  .table_data{
    text-align: center;
  }
</style>


</head>
<body>
  <?php 
  $id=$_SESSION['current_id'];
  $sql = mysqli_query($conn, "SELECT * FROM student_info WHERE user_id='$id'");

  while ($row = mysqli_fetch_array($sql)) {
    $student_name=$row['student_name'];
    $user_id=$row['user_id'];
    $ins_name=$row['ins_name'];
    $class_name=$row['class_name'];
    $phone=$row['phone'];
    $mail=$row['email'];
  }
  ?>
  <h2>Well Come to Your Profile <?php echo $student_name; ?></h2>
  <p style="font-size: 20px;" >You can See and Update Your Profile </p>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen">Update Profile</button>
    <button class="tablinks" onclick="openCity(event, 'London')">Profile</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Exam info</button>
  </div>

  <div id="London" class="tabcontent">
    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
    <h3 style="padding: 10px;">Your Profile Information</h3>
    <table style="width: 100%;">

      <col width="15%">
      <col width="85%">


      <tr>
        <td style="text-align: center;">Full Name</td>
        <td>
         : &nbsp;<?php echo $student_name; ?>
       </td>
     </tr>
     <tr>
      <td  style="text-align: center;"  >User Id</td>
      <td>
        : &nbsp;<?php echo $user_id; ?>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">INSTITUE NAME</td>
      <td>
        : &nbsp;<?php echo $ins_name; ?>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">Class Name</td>
      <td>
        : &nbsp;<?php echo $class_name; ?>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">Contact Number</td>
      <td>
       : &nbsp;+088<?php echo $phone; ?>
     </td>
   </tr>
   
   <tr>
    <td style="text-align: center;">Email</td>
    <td>
      : &nbsp;<?php echo $mail; ?>
    </td>
  </tr>

</table>
</div>

<div id="Paris" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 style="padding: 10px;">Update Your Profile Information</h3>
  


  <table style="width: 100%;">
   <col width="15%">
   <col width="70%">
   <col width="15%">
   
   


   <tr>

    <form action="user_profile_update.php" method="post">
      
      <td style="text-align: center;" >Full Name</td>
      <td>
        : &nbsp;
        <?php
              // $name_btn=false;

        $logic=true;
        if (isset($_GET['name'])) {
          $logic=false; ?>

          <input type="text" name="update_name" value="<?php echo $student_name; ?>">
        <?php } 
        else
        { 
          echo $student_name;
        } ?>
      </td>
      <td style="text-align: center;">
       <?php
       if ($logic==false) { ?>
        <input type="hidden" name="column_name" value="student_name">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <button style="border: none; background-color: transparent; text-decoration: underline;">Update</button>
        <?php
      }
      else{ ?>
        <a href="user_profile.php?name=<?php echo $student_name; ?>">Edit</a>
      <?php }
      ?>
    </td>
  </form>
</tr>
<tr >
  <td style="text-align: center;">User Id</td>
  <td>
    : &nbsp;<?php echo $user_id; ?>
  </td>
  <td style="text-align: center;"><a href=""></a></td>
</tr>


<tr>
  <form action="user_profile_update.php" method="post">
    <td style="text-align: center;">INSTITUE NAME</td>

    <td>
      : &nbsp;
      <?php
              // $name_btn=false;

      $logic=true;
      if (isset($_GET['ins_name'])) {
        $logic=false; ?>

        <input type="text" name="update_name" value="<?php echo $ins_name; ?>">
      <?php } 
      else
      { 
        echo $ins_name;
      } ?>
    </td>

    <td style="text-align: center;">
     <?php
     if ($logic==false) { ?>
      <input type="hidden" name="column_name" value="ins_name">  <!-- plese put your db column name -->
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <!-- do not change -->
      <button style="border: none; background-color: transparent; text-decoration: underline;">Update</button>
      <?php
    }
    else{ ?>
      <a href="user_profile.php?ins_name=<?php echo $ins_name; ?>">Edit</a>
    <?php }
    ?>
  </td>
</form>
</tr>



<tr>
  <form action="user_profile_update.php" method="post">
    <td style="text-align: center;">Class Name</td>
    <td>
      : &nbsp;
      <?php
              // $name_btn=false;

      $logic=true;
      if (isset($_GET['cls_name'])) {
        $logic=false; ?>

        <input type="text" name="update_name" value="<?php echo $class_name; ?>">
      <?php } 
      else
      { 
        echo $class_name;
      } ?>
    </td>
    <td style="text-align: center;">
     <?php
     if ($logic==false) { ?>
      <input type="hidden" name="column_name" value="class_name">  <!-- plese put your db column name -->
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <!-- do not change -->
      <button style="border: none; background-color: transparent; text-decoration: underline;">Update</button>
      <?php
    }
    else{ ?>
      <a href="user_profile.php?cls_name=<?php echo $ins_name; ?>">Edit</a>
    <?php }
    ?>
  </td>
</tr>



<tr>
  <form action="user_profile_update.php" method="post">

    <td style="text-align: center;">Contact Number</td>
    <td>
      : &nbsp;
      <?php
              // $name_btn=false;

      $logic=true;
      if (isset($_GET['phone'])) {
        $logic=false; ?>

        <input type="text" name="update_name" value="<?php echo $phone; ?>">
      <?php } 
      else
      { 
        echo $phone;
      } ?>
    </td>
    <td style="text-align: center;">
     <?php
     if ($logic==false) { ?>
      <input type="hidden" name="column_name" value="phone">  <!-- plese put your db column name -->
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <!-- do not change -->
      <button style="border: none; background-color: transparent; text-decoration: underline;">Update</button>
      <?php
    }
    else{ ?>
      <a href="user_profile.php?phone=<?php echo $phone; ?>">Edit</a>
    <?php }
    ?>
  </td>
  <form>
  </tr>
  


  <tr>
    <td style="text-align: center;">Email</td>
    <td>
      : &nbsp;<?php echo $mail; ?>
    </td>
    
  </tr>

</table>
</div>

<div id="Tokyo" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>

</div>

<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
</html> 
