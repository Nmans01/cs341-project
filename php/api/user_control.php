<?php
 session_start();
require("../db_functions.php");
$pdo = connect_to_db();



header('Content-Type: text/plain; charset=UTF-8');


// Admin case: show all room groups for the day.
if ($_SESSION['isAdmin']) {
    $stmt = $pdo->prepare(
        "SELECT * FROM siteUser"
    );
    $stmt->execute(); 
    $result = $stmt->fetchAll();
    echo JSON_encode($result);
}