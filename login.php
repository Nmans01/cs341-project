<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?PHP
    require('head.php');
    ?>
    <script src="login-page.js"></script>
    <link rel="stylesheet" href="./css/login-page.css">
</head>

<body>
    <?PHP
    require('header.php');
    ?>
    <main id="main">
        <h1 id="login-header">Login</h1>

        <div id="login-error-msg-holder">
            <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
        </div>

        <form id="login-form">
            <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username">
            <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">
            <input type="submit" value="Login" id="login-form-submit">
        </form>

    </main>
    <?PHP
    require('footer.php');
    ?>
</body>

</html>