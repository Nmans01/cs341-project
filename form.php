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
      <fieldset>
        <div class='form-row'>
          <label for="room">Room</label>
          <input type="text" id="room" name="room">
        </div>
      </fieldset>
      <fieldset>
        <legend>Projector Hours</legend>
        <div class="form-row">
          <label for="proj1norm">Projector 1 normal hours:</label>
          <input type="number" id="proj1norm" name="proj1norm">
        </div>
        <div class="form-row">
          <label for="proj2eco">Projector 1 eco hours:</label>
          <input type="number" id="proj1eco" name="proj1eco">
        </div>
        <div class="form-row">
          <label for="proj1norm">Projector 2 normal hours:</label>
          <input type="number" id="proj2norm" name="proj2norm">
        </div>
        <div class="form-row">
          <label for="proj2eco">Projector 2 eco hours:</label>
          <input type="number" id="proj2eco" name="proj2eco">
        </div>
      </fieldset>
      <!-- add normal + eco hours together for a total hour calculation -->


      <!-- Check of Laptop inputs -->
      <fieldset>
        <legend>Laptop Inputs</legend>
        <div class="form-row">
          <label for="LapCheck1"> Laptop Ethernet works</label>
          <input type="checkbox" id="LapCheck1" value="LapEthernet">
        </div>
        <div class="form-row">
          <label for="lapcheck2"> Laptop HDMI works</label>
          <input type="checkbox" id="LapCheck2" value="LapHdmi">
        </div>
        <div class="form-row">
          <label for="lapcheck3"> Laptop USB-C works</label>
          <input type="checkbox" id="LapCheck3" value="LapUsbc">
        </div>
        <div class="form-row">
          <label for="lapcheck4"> Laptop VGA works</label>
          <input type="checkbox" id="LapCheck4" value="LapVga">
        </div>
      </fieldset>

      <input type="submit" value="Submit">
    </form>
  </main>
  <?PHP
  require('footer.php');
  ?>
</body>

</html>