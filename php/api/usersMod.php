<?php

require("../db_functions.php");

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email']) && isset($_POST['isAdmin']) ){
    createUser();
}
else if(isset($_POST['deleteID'])){
    deleteUser();
}
else if(isset($_POST['promoteID'])){
    addAdmin();
}
else if(isset($_POST['demoteID'])){
    removeAdmin();
}
else {
    echo "Please provide the correct POST paramters.";
}

function createUser(){
    $db = connect_to_db();
    $sql = "INSERT INTO siteUser (username, passwordHash, name_first, name_last, email, isAdmin) 
    VALUES (:IDuser, :passwd, :firstname, :lastname, :email, :isadmin)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('IDuser'=>$_POST['username'], 'passwd'=>$_POST['password'], 'firstname'=>$_POST['first'],
    'lastname'=>$_POST['last'], 'email'=>$_POST['email'], 'isadmin'=>$_POST['isAdmin']));
}

function deleteUser(){
    $db = connect_to_db();
    $sql = "DELETE FROM siteUser WHERE userID = :IDuser";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('IDuser'=>$_POST['deleteID']));
}

function addAdmin(){
    $db = connect_to_db();
    $sql = "UPDATE siteUser SET isAdmin=1 WHERE userID = :IDuser";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('IDuser'=>$_POST['promoteID']));
}

function removeAdmin(){
    $db = connect_to_db();
    $sql = "UPDATE siteUser SET isAdmin=0 WHERE userID=:IDuser";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('IDuser'=>$_POST['demoteID']));
}