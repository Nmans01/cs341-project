<?php
/* session_start();
require("../db_functions.php");
$pdo = connect_to_db();



header('Content-Type: text/plain; charset=UTF-8');


// Admin case: show all room groups for the day.
if ($_SESSION['isAdmin']) {
    $stmt = $pdo->prepare(
        "SELECT * siteUser"
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
}  */
