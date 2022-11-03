<?php //header("Location: stub.php"); 
?>
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
    <h2>Podium Check Form</h2>
    <form>
      <fieldset><label for="room">Room
          <input type="text" id="room" name="room"></label></fieldset>
      <fieldset>
        <legend>Projector Hours</legend>
        <label for="proj1norm">Projector 1 normal hours:
          <input type="number" id="proj1norm" name="proj1norm"></label>
        <label for="proj2eco">Projector 1 eco hours:
          <input type="number" id="proj1eco" name="proj1eco"></label>
        <label for="proj1norm">Projector 2 normal hours:
          <input type="number" id="proj2norm" name="proj2norm"></label>
        <label for="proj2eco">Projector 2 eco hours:
          <input type="number" id="proj2eco" name="proj2eco"></label>
      </fieldset>
      <!-- add normal + eco hours together for a total hour calculation -->


      <!-- Check of Laptop inputs -->
      <fieldset>
        <legend>Laptop Inputs</legend>
        <label for="lapcheck1"> Laptop Ethernet works
          <input type="checkbox" id="LapCheck1" value="LapEthernet"></label>
        <label for="lapcheck2"> Laptop HDMI works
          <input type="checkbox" id="LapCheck2" value="LapHdmi"></label>
        <label for="lapcheck3"> Laptop USB-C works
          <input type="checkbox" id="LapCheck3" value="LapUsbc"></label>
        <label for="lapcheck4"> Laptop VGA works
          <input type="checkbox" id="LapCheck4" value="LapVga"></label>
      </fieldset>

      <input type="submit" value="Submit">
    </form>
  </main>
  <?PHP
  require('footer.php');
  ?>
</body>

</html>