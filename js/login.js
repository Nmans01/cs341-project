(function () {
    "use strict";

    let loginForm;
    let loginButton;
    let loginErrorMsg;

    window.addEventListener('load',init);

    function init () {
        loginForm = document.getElementById("login-form");
        loginButton = document.getElementById("login-form-submit");
        loginErrorMsg = document.getElementById("login-error-msg");

        loginButton.addEventListener("click", (e) => {
            e.preventDefault();
            const username = loginForm.username.value;
            const password = loginForm.password.value;
        
            if (username === "user" && password === "web_dev") {
                alert("You have successfully logged in.");
                location.reload();
            } else {
                loginErrorMsg.style.opacity = 1;
            }
        });
    }
})();