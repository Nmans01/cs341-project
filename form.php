<?php //header("Location: stub.php"); 
?>
<html>

<head>
  <title>Form</title>
  <?PHP
  require('head.php');
  ?>
  <script src="./js/form.js"></script>
</head>

<body>
  <?PHP
  require('header.php');
  ?>
  <main id="main">
    <h2>Podium Check Form</h2>
    <form class='pc' id='roomForm'>
      <fieldset>
        <div class='form-row'>
          <label for="room">Room</label>
          <select type="select" id="room" name="room">
            <option value="">Select a room...</option>
          </select>
        </div>
      </fieldset>
    </form>
    <form class='pc' id='checkForm'>
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


      <!-- Check of Laptop inputs
      <fieldset>
        <legend>Laptop Inputs</legend>
        <div class="form-row">
          <label for="LapCheck1"> Laptop Ethernet works</label>
          <input type="checkbox" id="LapCheck1" value="LapEthernet">
        </div>
        <div class="form-row">
          <label for="LapCheck2"> Laptop HDMI works</label>
          <input type="checkbox" id="LapCheck2" value="LapHdmi">
        </div>
        <div class="form-row">
          <label for="LapCheck3"> Laptop USB-C works</label>
          <input type="checkbox" id="LapCheck3" value="LapUsbc">
        </div>
        <div class="form-row">
          <label for="LapCheck4"> Laptop VGA works</label>
          <input type="checkbox" id="LapCheck4" value="LapVga">
        </div>
        <div class="form-row">
          <label for="LapCheck5"> Laptop 3.5mm sound works</label>
          <input type="checkbox" id="LapCheck5" value="LapVgaSound">
        </div>
      </fieldset>


      Lectern PC/Zoom/Hovercam checks
      <fieldset>
        <legend>Lectern PC checks</legend>
        <div class="form-row">
          <label for="pcCheck1"> Can you play sound through the room speakers?</label>
          <input type="checkbox" id="pcCheck1" value="pcSound">
        </div>
        <div class="form-row">
          <label for="pcCheck2"> Do the cameras work in Zoom?</label>
          <input type="checkbox" id="pcCheck2" value="pcWebcam">
        </div>
        <div class="form-row">
          <label for="pcCheck3"> Are the room mics working in Zoom?</label>
          <input type="checkbox" id="pcCheck3" value="pcWebcam">
        </div>
        <div class="form-row">
          <label for="pcCheck4"> Does the Hovercam work on the PC?</label>
          <input type="checkbox" id="pcCheck4" value="pcHovercam">
        </div>
        <div class="form-row">
          <label for="pcCheck5"> Does the Hovercam work over the Crestron system?</label>
          <input type="checkbox" id="pcCheck5" value="pcHovercamCrestron">
        </div>
      </fieldset> -->

      <!-- Checks for specialized rooms?
    H110/212 has mics
    Grab Gibble proj hours?
    Event
    
    -->

      <input type="button" value="Submit" id='submit'>
    </form>
  </main>
  <?PHP
  require('footer.php');
  ?>
</body>

</html>