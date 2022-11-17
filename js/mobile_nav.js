(function () {
    "use strict";

    let navButton;
    let navBar;

    window.addEventListener('load',init);

    function init () {
        navButton = document.getElementById("menu");
        navBar = document.getElementsByTagName("nav")[0];


        // When button is clicked in mobile view, show (display flex)/hide (display none) nav bar
        navButton.addEventListener("click", (e) => {
            e.preventDefault();

            let css = window.getComputedStyle(navBar);

            if (css.display=="none") {
                navBar.style.display = "flex";
            } else {
                navBar.style.display = "none";
            }
        });
        // When window is resized to desktop view, always show (display flex) nav bar
        window.addEventListener("resize", (e) => {

            //console.log(e.target.innerWidth);

            // WIDTH HERE IS HARD-CODED, CHANGE ACCORDING TO MOBILE VIEW WIDTH
            if (e.target.innerWidth>710) {
                navBar.style.display = "flex";
            } else {
                navBar.style.display = "none";
            }
        });
    }
})();