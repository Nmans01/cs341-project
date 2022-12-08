(function () {
    "use strict";

    let userTable;
    let addUserbtn;
    let removeUserbtn;
    let userSearch;
    let userForm;
    let tableMessage;

    let currentTable;

    window.addEventListener('load', init);

    function init() {
        userTable = document.getElementById("userTable");
        addUserbtn = document.getElementById('addUser');
        removeUserbtn = document.getElementById('removeUser');
        userSearch = document.getElementById('userSearch');
        userForm = document.getElementById('userForm');

        updateTable();

        // update table when search bar is updated
        userSearch.addEventListener("change", updateTable);

        removeUserbtn.addEventListener("click",() => {
            if (userTable.classList.contains('deleteMode')) {
                userTable.classList.remove('deleteMode');
                removeUserbtn.classList.remove('deleteMode');

                tableMessage = document.getElementById('tableMessage');
                tableMessage.innerText = 'Click on a user in the table to edit...';
            } else {
                userTable.classList.add('deleteMode');
                removeUserbtn.classList.add('deleteMode');
                
                tableMessage = document.getElementById('tableMessage');
                tableMessage.innerText = 'Click on a user in the table to delete...';
            }
        });

        userTable.addEventListener("click", (e) => {
            if (userTable.classList.contains('deleteMode')) {
                deleteUser(e);
            } else {
                selectUser(e);
            }
        });

        // update form to take new user
        addUserbtn.addEventListener("click",createUser);
    }

    function updateTable() {

        fetch('./php/api/users.php?search='+userSearch.value)
        .then((response) => response.json())
        .then((table) => {
            console.log(table);

            currentTable = JSON.parse(JSON.stringify(table));
            console.log(currentTable);

            if (!table.length) {
                console.log("Nothing");
                return;
            }
            
            let nrHTML = `
            <tr>
                <td colspan="3"><em id='tableMessage'>Click on a user in the table to edit...</em></td>
            </tr>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Admin</th>
            </tr>
            `;
            let row;
            table.forEach(row => {
                nrHTML+=`
                <tr class='userTableRow'>
                    <td>${row.name_first} ${row.name_last}</td>
                    <td>${row.username}</td>
                    <td>${row.isAdmin==1}</td>
                </tr>
                `;
            });
            userTable.innerHTML = nrHTML;
        });
    }

    // Called when user is clicked on in table
    function selectUser (e) {
        if (userForm.innerText) {
            alert('Save or discard changes first.')
            return;
        }

        if (e.target.tagName!='TD')
            return;

        // Scuffed
        let rowClicked = Array.prototype.indexOf.call(e.target.parentElement.parentElement.children,e.target.parentElement)-2;
        console.log(rowClicked);

        let user = currentTable[rowClicked];
        console.log(Object.entries(user));
        let nrHTML = `
            <h4>Edit: ${user.name_first} ${user.name_last} (${user.username})</h4>
        `;
        Object.entries(user).slice(1).forEach(attr =>{
            nrHTML += `
            <div class="form-row">
                <label for="${attr[0]}">${attr[0]}</label>
                <input type="text" id="${attr[0]}" name="${attr[0]}" value="${attr[1]}">
            </div>`;
        })
        userForm.innerHTML = nrHTML + `
        <input type='button' value='Save Changes' id='submit'>
        <input type='button' value='Discard Changes' id='discard'>`;

        let discardBtn = document.getElementById('discard');
        discardBtn.addEventListener('click', () => {
            userForm.innerHTML = '';
        });
    }

    function createUser () {
        if (userForm.innerText) {
            alert('Save or discard changes first.')
            return;
        }
        if (!currentTable)
            return;

        //Example user for getting attributes, assuming there are users in the table
        let user = currentTable[0];
        console.log(Object.entries(user));
        let nrHTML = `
            <h4>Create New User:</h4>
        `;
        Object.entries(user).slice(1).forEach(attr =>{
            nrHTML += `
            <div class="form-row">
                <label for="${attr[0]}">${attr[0]}</label>
                <input type="text" id="${attr[0]}" name="${attr[0]}" value="">
            </div>`;
        })
        userForm.innerHTML = nrHTML + 
            `<div class="form-row">
                <label for="password">password</label>
                <input type="password" id="password" name="password" value="">
            </div>
            <div class="form-row">
                <label for="confpassword">confirm password</label>
                <input type="password" id="confpassword" name="confpassword" value="">
            </div>
            <input type='button' value='Create User' id='submit'>
            <input type='button' value='Discard Changes' id='discard'>`;

        // Button and listener get destroyed everytime form is remade.
        let submitBtn = document.getElementById('submit');
        submitBtn.addEventListener('click', () => {

            if (document.getElementById('confpassword').value!=document.getElementById('password').value) {
                alert('Could not create User: Passwords do not match.');
                return;
            }

            let data = new FormData(userForm);

            fetch('./php/api/usersMod.php', {
                method: 'POST',
                body: data
            })
            .then((response) => {
                console.log(response);
                return response.json();})
            .then((response) => {

            });

            updateTable();
        });

        let discardBtn = document.getElementById('discard');
        discardBtn.addEventListener('click', () => {
            userForm.innerHTML = '';
        });
    }

    function deleteUser(e) {
        console.log('Delete user? :(');
    }
})();