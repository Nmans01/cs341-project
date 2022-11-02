<?php //header("Location: stub.php"); 
?>

<html>

<head>
  <title>Form</title>
  <link rel="stylesheet" href="./css/style.css">
  <?PHP
  require('head.php');
  ?>
</head>

<body>
  <?PHP
  require('header.php');
  ?>
  <main id="main">
    <form>
      <label for="proj1norm">Projector 1 normal hours:</label><br>
      <input type="text" id="fname" name="fname"><br>
      <label for="proj2norm">Projector 2 normal hours:</label><br>
      <input type="text" id="lname" name="lname">


      <input type="submit" value="Submit">
    </form>
  </main>
  <?PHP
  require('footer.php');
  ?>
</body>

</html>