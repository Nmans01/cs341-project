<?php

require("../db_functions.php");

if (isset($_GET["userID"])) {
    $userID = strtolower($_GET["userID"]);
    $result = get_user($userID);
    header("Content-type: application/json");
    echo(json_encode($result));
    
} else {
    $result = get_users();
    header("Content-type: application/json");
    echo(json_encode($result));
}

function get_user($userID){
    $db = connect_to_db();
    $sql = "SELECT userID, username, name_first, name_last, email, isAdmin FROM siteUser WHERE userID = :IDuser;";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('IDuser'=>$userID));

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;

}

function get_users(){
    $db = connect_to_db();
    $sql = "SELECT userID, username, name_first, name_last, email, isAdmin FROM siteUser";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $result = array();
    $last_group = "";
    $group_items = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        list($uID, $uName, $uFirst, $uLast, $uEmail, $uIsAdmin) = array_values($row);
        $user = array("userID" => $uID, "username" => $uName, "firstName" => $uFirst, "lastName" => $uLast, "email" => $uEmail, "isAdmin" => $uIsAdmin);
        
        if ($last_group !== $uID) {
            if ($last_group) {
              $result[$last_group] = $group_items;
              $group_items = array();
            }
            $last_group = $uID;
          }
          array_push($group_items, $user);
        }
        
        if ($last_group) {
          $result[$last_group] = $group_items;
        }
        return $result;

}

?>


