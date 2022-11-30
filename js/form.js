(function () {
    "use strict";

    let roomForm;
    let roomSelect;
    let checkForm;
    let dynamicForm;

    window.addEventListener('load',init);

    function init () {
        roomForm = document.getElementById("roomForm");
        roomSelect = document.getElementById("room");
        checkForm = document.getElementById("checkForm");
        dynamicForm = document.getElementById("dynamicForm");

        // On site load, populate dropdown with list of rooms
        fetch('./php/api/assigned_rooms.php')
        .then((response) => response.json())
        .then((table) => {
            console.log(table);

            if (!table.length) {
                console.log("Nothing");
                return;
            }
            
            let nrHTML = "";
            table.forEach(row => {
                nrHTML+='<option value="'+row[0]+'">'+row[1]+'</option>';
            });
            roomSelect.innerHTML += nrHTML;
        });

        // On updating dropdown value, populate form with 
        // 1. projectors.
        // 2. room attributes.
        roomSelect.addEventListener('change',(e)=>{

            let roomID = e.target.value;
            console.log(e.target.value);

            let data = new FormData(roomForm);

            dynamicForm.innerHTML = 'Loading...<br><br>';

            fetch('./php/api/form_get_room_attributes.php', {
                method: 'POST',
                body: data
            })
            .then((response) => {
                console.log(response);
                return response.json();})
            .then((response) => {
                let table = Object.entries(response);

                let holder = document.createElement('div');

                let nrHTML = '';
                // for each category, make a fieldset
                table.forEach(category => {
                    nrHTML = `
                    <fieldset>
                        <legend>`+category[0]+`</legend>
                    `;

                    // for each attribute in the category, make a label and checkbox
                    // wrapped in a div
                    category[1].forEach(row => {
                        nrHTML += `
                        <div class="form-row">
                            <label for="`+row.attributeName+`">`+row.displayName+`:</label>
                            <input type="checkbox" id="`+row.attributeName+`" name="`+row.attributeName+`">
                        </div>
                        `;
                    });

                    nrHTML += `
                    </fieldset>
                    `;

                    holder.innerHTML+=nrHTML;
                });

                dynamicForm.innerHTML = holder.innerHTML;
            });
        });
    }
})();