<?php

function login() {
    require('config.php');
    $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $myhash = mysqli_real_escape_string($db,password_hash($_POST['password'], PASSWORD_DEFAULT)); 
      
      $sql = "SELECT userID,name_first,isAdmin FROM user WHERE username = '$myusername' and passwordHash = '$myhash'";
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
   return $error;
}


// TODO Get user -> current assignment -> room group -> list of rooms
function getRooms() {
    require('config.php');
    $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_SESSION['login_user'];
      
      // sort to the newest assignment/one that matches the date where username matches
      $sql = "SELECT userID,name_first,isAdmin FROM users WHERE username = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // else {
      // $error = "Your username or password is invalid.";
      // }
   }
   return $error;
}