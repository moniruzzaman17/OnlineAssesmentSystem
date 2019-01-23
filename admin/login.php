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
              <h2>Login Here</h2>
            

              <form action="login_sql.php" method="POST">
                <table>
                  <tr>
                    <th style="font-size: 22px; font-weight: normal;">
                    User name:
                    </th>
            <td>
              <input type="text" name="username" placeholder="Username" required>
            </td>
                  </tr>
                  <tr>
                    <th style="font-size: 22px; font-weight: normal;">
                      password:
                    </th>
            <td>
              <input type="password" name="password" placeholder="password" required>
            </td>
                  </tr>
                </table>
                
                  <button class="btn" name="button" value="submit">LOGIN</button>
                  
              </form>
              <a href="forget_pass.php">Forgot Password</a>
            
        </div>
     <div class="right">
     </div>
  </div>
</body>
</html>