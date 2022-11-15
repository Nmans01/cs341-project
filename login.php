<!DOCTYPE html>

<?php
   include("./php/db_functions.php");
   session_start();
   $error=login();
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
    
    <p id="login-error-msg"><?php echo $error;?></p>
    
    <form  action = "" method = "post" id="login-form">
      <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username">
      <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">
      <input type="submit" value="Log in" id="login-form-submit">
    </form>
  
  </main>
</body>

</html>