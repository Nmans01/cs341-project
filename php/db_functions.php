<?php

use LDAP\Result;

function debug_to_console($data) {
   $output = $data;
   if (is_array($output))
       $output = implode(',', $output);

   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

require('config.php');

function connect_to_db() {
   global $database,$databasehost,$databaseuser,$databased;
   $dsn = "mysql:host=$databasehost;dbname=$database;charset=UTF8";
   
   $pdo = new PDO($dsn, $databaseuser, $databased);
   return $pdo;
}

function login() {
   $error="";
   $pdo = connect_to_db();
   
   // DELETE THIS LATER! FOR NOW: IF NO USERS,
   // DELETE ALL ASSIGNMENTS AND GENERATE TEST USERS
   $stmt = $pdo->prepare(
      "SELECT COUNT(*) FROM siteUser"
   );
   $stmt->execute(); 
   $result = $stmt->fetch();
   if(! $result[0]) {

      $stmt = $pdo->prepare(
         "DELETE FROM assignment"
      );
      $stmt->execute(); 

      require('gen_test_cases.php');
      genTestCases();
   }

   // CHECK: If method not post, return
   if ($_SERVER["REQUEST_METHOD"] != "POST") return;

   // username and password sent from form 
   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];

   // Get table entries with matching username, 
   // only get key information for user session
   $stmt = $pdo->prepare(
      "SELECT userID,passwordHash,name_first,isAdmin 
      FROM siteUser 
      WHERE username = ?"
   );
   $stmt->execute(array($myusername)); 
   $result = $stmt->fetchall();
   $row = $result[0];
   
   // CHECK: If multiple rows returned from DB, or none, return
   $count = count($result);
   if ($count == 0)
      // No account found with username
      return "Your username or password is invalid.";
   else if ($count > 1)
      return "More than one account found with given username. Alert admin with this information.";

   // CHECK: If password does not match, return
   if (!password_verify($mypassword, $row['passwordHash']))
      return "Your username or password is invalid.";

   $_SESSION['login_user'] = $myusername;
   $_SESSION['userID'] = $row['userID'];
   $_SESSION['name_first'] = $row['name_first'];
   $_SESSION['isAdmin'] = $row['isAdmin'];
   header("location: index.php");

   return $error;
}

// Returns the group ID that the active user is assigned for the day.
function getAssignment($date = null) {

   $pdo = connect_to_db();

   if (!$date) $date = time();

   date_default_timezone_set('America/New_York');

   $myuserID = $_SESSION['userID'];
   $mydate = date("Y-m-d",$date);

   $stmt = $pdo->prepare(
      "SELECT roomGroup_roomGroupID 
      FROM assignment 
      WHERE user_userID = ? and assignmentDate = ?"
   );
   $stmt->execute(array($myuserID,$mydate)); 
   $result = $stmt->fetchAll();

   debug_to_console(count($result));
   if (!count($result)) return null;
   return $result[0]['roomGroup_roomGroupID'];
}

// Format a string to explain the assignment for the day,
// including what group is getting checked and who
function assignmentMessage() {
   $myroomGroup = getAssignment();
   if(!$myroomGroup)
      return 'Nothing today.';

   $pdo = connect_to_db();

   $out = 'You will be checking Room Group '.$myroomGroup;

   $myuserID = $_SESSION['userID'];
   $mydate = date("Y-m-d");

   $stmt = $pdo->prepare(
      "SELECT name_first,name_last 
      FROM user 
      WHERE userID in (
         SELECT user_userID 
         FROM assignment 
         WHERE user_userID !=? AND roomGroup_roomGroupID = ? and assignmentDate = ?
      )"
   );
   $stmt->execute(array($myuserID,$myroomGroup,$mydate)); 
   $result = $stmt->fetchall();

   if (count($result)) {
      $nameList = [];
      foreach ($result as $teammate) {
         array_push($nameList,$teammate['name_first'].' '.$teammate['name_last']);
      }
      $out = $out.' with '.implode(' and ',$nameList);
   }

   return $out.'.';
}

// Returns an array of room names (TODO return IDs) that the active user is assigned for the day.
function getRooms() {
   $pdo = connect_to_db();

   //$myuserID = $_SESSION['userID'];
   $myGroup = getAssignment();

   $stmt = $pdo->prepare(
      "SELECT roomName 
      FROM room 
      WHERE roomGroup_roomGroupID = ?"
   );
   $stmt->execute(array($myGroup)); 
   $result = $stmt->fetchAll();

   debug_to_console(count($result));
   if (!count($result)) return null;
   return $result;
}