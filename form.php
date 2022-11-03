<?php //header("Location: stub.php"); 
?>
<?php //header("Location: stub.php"); ?>
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
  <h2>Podium Check Form</h2>
  <label for="proj1norm">Projector 1 normal hours:</label><br>
  <input type="number" id="proj1norm" name="proj1norm"><br>
  <label for="proj2eco">Projector 1 eco hours:</label><br>
  <input type="number" id="proj1eco" name="proj1eco">
  <label for="proj1norm">Projector 1 normal hours:</label><br>
  <input type="number" id="proj2norm" name="proj2norm"><br>
  <label for="proj2eco">Projector 2 eco hours:</label><br>
  <input type="number" id="proj2eco" name="proj2eco">

  //add normal + eco hours together for a total hour calculation


  //Check of Laptop inputs
  <input type="checkbox" id="LapCheck1" value="LapEthernet">
  <label for="lapcheck1"> Laptop Ethernet works</label><br>
  <input type="checkbox" id="LapCheck2" value="LapHdmi">
  <label for="lapcheck2"> Laptop HDMI works</label><br>
  <input type="checkbox" id="LapCheck3" value="LapUsbc">
  <label for="lapcheck3"> Laptop USB-C works</label>
  <input type="checkbox" id="LapCheck4" value="LapVga">
  <label for="lapcheck4"> Laptop VGA works</label>


  <input type="submit" value="Submit">
</form> 
    </main>
    <?PHP
    require('footer.php');
    ?>
</body>
</html>
