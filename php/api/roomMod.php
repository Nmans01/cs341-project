<?php

require("../db_functions.php");

if (isset($_POST['roomID']) && isset($_POST['roomName']) && isset($_POST['groupID'])){
    createRoom();
}
else if(isset($_POST['deleteID'])){
    deleteRoom();
} else {
    echo "Please provide the correct POST paramters.";
}

function createRoom(){
    $db = connect_to_db();
    $sql = "INSERT INTO room (roomID, roomGroup_roomGroupID, roomName) VALUES (:room_id, :roomGroup, :roomName)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('room_id'=>$_POST['roomID'], 'roomGroup'=>$_POST['groupID'], 'roomName'=>$_POST['roomName']));
}

function deleteRoom(){
    $db = connect_to_db();
    $sql = "DELETE FROM room WHERE roomID = :room_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('room_id'=>$_POST['deleteID']));
}