<?php

require("../db_functions.php");

if (isset($_GET["groupID"])) {
    $group = strtolower($_GET["groupID"]);
    $result = get_group($group);
    header("Content-type: application/json");
    echo(json_encode($result));
    
} else if (isset($_GET["search"])){
    $result = searchRooms($_GET["search"]);
    header("Content-type: application/json");
    echo(json_encode($result));
} else {
    $result = get_groups();
    header("Content-type: application/json");
    echo(json_encode($result));
}

function get_group($groupID){

    $db = connect_to_db();
    $sql = "SELECT * FROM room WHERE roomGroup_roomGroupID = :group;";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('group'=>$groupID));

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;

}

function get_groups(){
    $db = connect_to_db();
    $sql = "SELECT * FROM room";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $result = array();
    $last_group = "";
    $group_items = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        list($roomID, $groupID, $roomName) = array_values($row);
        $room = array("name" => $roomName, "groupID" => $groupID, "roomID" => $roomID);

        if ($last_group !== $groupID) {
            if ($last_group) {
              $result[$last_group] = $group_items;
              $group_items = array();
            }
            $last_group = $groupID;
          }
          array_push($group_items, $room);
        }
        
        if ($last_group) {
          $result[$last_group] = $group_items;
        }
        return $result;

}

function searchRooms($search){
  $db = connect_to_db();
  $sql = "SELECT * FROM room WHERE CONCAT(roomID, ' ', roomName) LIKE CONCAT('%', :search, '%');";
  $stmt = $db->prepare($sql);
  $stmt->execute(array('search'=>$search));
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $data;
}

?>