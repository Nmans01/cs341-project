<?php 
session_start();
if(!isset($_SESSION['name_first'])) {
    header("Location:login.php"); 
}
?>
<header>
    <div id="title">
        <div id='menu' class="dropdown">
            <a>
                <img class='icon' src="./img/menu-white.png">
            </a>
        </div>
        <h1>Lighthouse <span class='hide-when-small'>Podium Check</span></h1>
        <div id='user' class="dropdown">
            <div id='ucontainer'>
                <div id='welcome' class="dropbtn hide-when-small">Welcome back, <span id='username'><?PHP echo $_SESSION['name_first']; ?>.</span></div>
                <img class='icon' src="./img/white-user-invert.png">
            </div>
            <div class="dropdown-content">
                <!--<a href="login.php">Log in</a>-->
                <a href="profile.php">Your Profile</a>
                <a href="./php/logout.php">Log out</a>
            </div>
        </div>
    </div>
    <nav>
        <a href="index.php">Home</a>
        <a href="form.php"><span class='hide-when-small'>Podium Check</span> Form</a>
        <!--<a href="trends.php">Trends</a>-->
        <!--<a href="inventory.php">inventory</a>-->
        <?php if ($_SESSION['isAdmin']) echo 
            '<a href="admin.php">Admin</a>'; 
        ?>
        <a href="about.php">About</a>
    </nav>
</header>