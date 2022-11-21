(function () {
    "use strict";

    let roomForm;
    let roomSelect;

    window.addEventListener('load',init);

    function init () {
        roomForm = document.getElementById("roomForm");
        roomSelect = document.getElementById("room");

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

        // On updating dropdown value, populate form with room attributes.
        roomSelect.addEventListener('change',(e)=>{

            let roomID = e.target.value;
            console.log(e.target.value);

            let data = new FormData(roomForm);

            fetch('./php/api/room_attributes.php', {
                method: 'POST',
                body: data
            })
            .then((response) => {
                console.log(response);
                return response.json();})
            .then((table) => {
                console.log(table);

                /* if (!table.length) {
                    console.log("Nothing");
                    return;
                }

                let nrHTML = "";
                table.forEach(row => {
                    nrHTML+='<option value="'+row[0]+'">'+row[1]+'</option>';
                });
                roomSelect.innerHTML += nrHTML; */
            });
        });
    }
})();