(function () {
    "use strict";

    let roomSelect;

    window.addEventListener('load',init);

    function init () {
        roomSelect = document.getElementById("room");

        fetch('./php/api/assigned_rooms.php')
        .then((response) => {
            if (response.status >= 200 && response.status < 300 || response.status === 0) {
                return response.json();
            } else {
                return Promise.reject(new Error(response.status + ": " + response.statusText));
            }
        })
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
    }
})();