<!DOCTYPE html>

<?php
   include("./php/config.php");
   $error="";
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT userID,name_first,isAdmin FROM users WHERE username = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if ($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['name_first'] = $row['name_first'];
         $_SESSION['isAdmin'] = $row['isAdmin'];
         header("location: index.php");
      } else {
        //echo '<script>alert("Test")</script>';
        $error = "Your username or password is invalid.";
      }
   }
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?PHP
  require('head.php');
  ?>
  <link rel="stylesheet" href="./css/login-page.css">
  <!--<script src="./js/login.js"></script>-->
</head>

<body>
  <main id="login-holder">
    <h1 id="login-header">Log in</h1>
    
    <p id="login-error-msg"><?php echo $error; ?></p>
    
    <form  action = "" method = "post" id="login-form">
      <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username">
      <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">
      <input type="submit" value="Log in" id="login-form-submit">
    </form>
  
  </main>
</body>

</html>