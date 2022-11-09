<?PHP
function logout() {
    session_destroy();
    header("location:login.php");
}

if (!isset($_POST["username"]) || !isset($_POST["password"])) return;

$user = authorize($_POST["username"], $_POST["password"]);

$_SESSION["loggedIn"] = is_array($user) ? "YES" : "NO";
if ($_SESSION["loggedIn"] == "YES") {
    $_SESSION["UserID"] = $user["aid"];
    if ($_SESSION["profile"] == "") {
        $_SESSION["profile"] = "images/secretAgent.jfif";
    }
} else {
    $_SESSION["UserID"] = "";
    $_SESSION["profile"] = "";
}
