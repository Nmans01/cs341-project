<html>

<head>
  <title>Users</title>
  <script src="./js/user.js"></script>
  <?PHP
  require('head.php');
  ?>
</head>

<body>
  <?PHP
  require('header.php');
  ?>
<link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap"
      rel="stylesheet"
    />

    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0px;
        background-color: gray;
      }
      h1 {
        text-align: center;
      }
      table,
      form {
        width: 500px;
        margin: 20px auto;
      }
      table {
        border-collapse: collapse;
        text-align: center;
      }
      table td,
      table th {
        border: solid 1px black;
      }
      label,
      input {
        display: block;
        margin: 10px 0;
        font-size: 15px;
        font: bold;
       
      }
      button {
        display: block;
      }
    </style>
  </head>
  <main id="Main">
  <div class="flex-parent jc-center">
    <div class="dropDown">
    <button class="dropbtn2">Edit Options</button>
    <div class="dropdownLinks">
      <a href="Date">Data</a>
    </div>
  </div>
</div>
  <body>
    <h1>User Table</h1>
    <form>
      <div class="input-row">
        <label for="FirstName">First Name</label>
        <input type="text" name="First Name" id="FirstName" />
      </div>
      <div class="input-row">
        <label for="LastName">Last Name</label>
        <input type="text" name="Last Name" id="LastName" />
      </div>
      <button>Submit</button>
    </form>
    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    </main>
    <?PHP
    require('footer.php');
    ?>
    <script>
      const formEl = document.querySelector("form");
      const tbodyEl = document.querySelector("tbody");
      const tableEl = document.querySelector("table");
      function onAddWebsite(e) {
        e.preventDefault();
        const LastName = document.getElementById("LastName").value;
        const FirstName = document.getElementById("FirstName").value;
        tbodyEl.innerHTML += `
            <tr>
                <td>${FirstName}</td>
                <td>${LastName}</td>
                <td><input type="checkbox" id="Admin" name="Admin" value="Admin"><label for="Admin">Admin</label><td>
                <td><button class="deleteBtn">Delete</button></td>
            </tr>
        `;
      }

      function onDeleteRow(e) {
        if (!e.target.classList.contains("deleteBtn")) {
          return;
        }

        const btn = e.target;
        btn.closest("tr").remove();
      }

      formEl.addEventListener("submit", onAddWebsite);
      tableEl.addEventListener("click", onDeleteRow);
    </script>
  </body>
</html>

