<?php //header("Location: stub.php"); 
?>
<html>

<head>
  <title>Users</title>
  <?PHP
  require('head.php');
  ?>
</head>

<body>
  <?PHP
  require('header.php');
  ?>

  <main id="Main">
  <div class="flex-parent jc-center">
    <div class="dropDown">
    <button class="dropbtn2">Edit Options</button>
    <div class="dropdownLinks">
      <a href="Date">Date</a>
      <a href="Form">Form edit</a>
    </div>
  </div>
</div>
  


<div style="overflow-x:auto;">
<button id ="addUser">Add User</button>
  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Status</th>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>
      <input type="checkbox" id="deletebtn" name="deletebtn">
      <label for="deletebtn">Delete User</label>
      <input type="checkbox" id="adminbtn" name="adminbtn">
      <label for="deletebtn">Admin</label>
      </td>
    </tr>
    <tr>
      <td>Eve</td>
      <td>Jackson</td>
      <td>
      <input type="checkbox" id="deletebtn" name="deletebtn">
      <label for="deletebtn">Delete User</label>
      <input type="checkbox" id="adminbtn" name="adminbtn">
      <label for="deletebtn">Admin</label>
      </td>
    </tr>
    <tr>
      <td>Adam</td>
      <td>Johnson</td>
      <td>
      <input type="checkbox" id="deletebtn" name="deletebtn">
      <label for="deletebtn">Delete User</label>
      <input type="checkbox" id="adminbtn" name="adminbtn">
      <label for="deletebtn">Admin</label>
      </td>
    </tr>
  </table>
</div>
</Main>
<?PHP
  require('footer.php');
  ?>
</body>
</html>

  
