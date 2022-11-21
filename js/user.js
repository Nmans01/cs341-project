/*(function () {
    "use strict";

    let UserTable;
    let addUserbtn = document.querySelector('addUser');

    window.addEventListener('load',init);
    

    function init () {
        UserTable = document.getElementById("UserTable");
        addUserbtn.addEventListener('click', nothing());
         

        fetch('./php/api/user_control.php')
        .then((response) => response.json())
        .then((result) => {
            let tableInfo = "";
            console.log(result);
            result.foreach();
        });
    }
})();*/