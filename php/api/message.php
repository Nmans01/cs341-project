<?php
session_start();
require("../db_functions.php");
$pdo = connect_to_db();

date_default_timezone_set('America/New_York');
$mydate = date("Y-m-d");

header('Content-Type: text/plain; charset=UTF-8');


// Admin case: show all room groups for the day.
if ($_SESSION['isAdmin']) {
    $stmt = $pdo->prepare(
        "SELECT roomGroup_roomGroupID, userID, concat(name_first,' ',name_last) as full_name
        FROM assignment
        JOIN siteUser ON assignment.siteUser_userID=siteUser.userID
        WHERE assignmentDate = :date;"
    );
    $stmt->execute(array('date'=>$mydate)); 
    $result = $stmt->fetchAll();

    // If no results
    if (!count($result)) {
        echo 'Nothing today.';
    }

    $nameList = array();
    foreach ($result as $teammate) {

        if (!array_key_exists($teammate['roomGroup_roomGroupID'],$nameList) )
            $nameList[$teammate['roomGroup_roomGroupID']]=array();
        array_push($nameList[$teammate['roomGroup_roomGroupID']],$teammate['full_name']);
    }
    foreach ($nameList as $no => $group) {
        $out = 'Checking Room Group '.$no.':';
        $out = $out.' '.implode(', ',$group);
        echo $out.'.';
    }
} 
// Regular user case
else {
    $myuserID = $_SESSION['userID'];

    $stmt = $pdo->prepare(
        "SELECT roomGroup_roomGroupID, userID, concat(name_first,' ',name_last) as full_name
        FROM assignment
        JOIN siteUser ON assignment.siteUser_userID=siteUser.userID
        WHERE roomGroup_roomGroupID = (
            SELECT roomGroup_roomGroupID
            FROM assignment
            WHERE siteUser_userID = :uid AND assignmentDate = :date
        ) AND assignmentDate = :date;"
    );
    $stmt->execute(array('uid'=>$myuserID,'date'=>$mydate)); 
    $result = $stmt->fetchAll();

    // If no results
    if (!count($result)) {
        echo 'Nothing today.';
        return;
    }

    $out = 'You will be checking Room Group '.$result[0]['roomGroup_roomGroupID'];
    $nameList = [];
    foreach ($result as $teammate) {
        if ($teammate['userID']!=$myuserID)
            array_push($nameList,$teammate['full_name']);
    }
    if (count($nameList))
        $out = $out.' with '.implode(' and ',$nameList);

    echo $out.'.';
}