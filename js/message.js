(function () {
    "use strict";

    let messageP;

    window.addEventListener('load',init);

    function init () {
        messageP = document.getElementById("message");

        fetch('./php/api/message.php')
        .then((response) => response.text())
        .then((text) => {
            messageP.innerHTML = text;
        });
    }
})();