<?php
session_start();
require("../db_functions.php");
$pdo = connect_to_db();

date_default_timezone_set('America/New_York');
$mydate = date("Y-m-d");

$myuserID = $_SESSION['userID'];

// Returns a json containing an array of ID/name pairs for rooms which a user is assigned.
header('Content-Type: application/json; charset=utf-8');

if ($_SESSION['isAdmin']) {
    $stmt = $pdo->prepare(
        "SELECT roomID, roomName
        FROM room;"
    );
    $stmt->execute(array('uid'=>$myuserID,'date'=>$mydate)); 
    $result = $stmt->fetchAll();
    
    echo json_encode($result);
    return;
}

$stmt = $pdo->prepare(
    "SELECT roomID, roomName
    FROM room
    WHERE roomGroup_roomGroupID = (
        SELECT roomGroup_roomGroupID
        FROM assignment
        WHERE siteUser_userID = :uid AND assignmentDate = :date
    );"
);
$stmt->execute(array('uid'=>$myuserID,'date'=>$mydate)); 
$result = $stmt->fetchAll();

echo json_encode($result);