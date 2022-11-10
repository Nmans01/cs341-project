<?php

require('config.php');

function connect_to_db(){
    global $database,$databasehost,$databaseuser,$databasepassword;
    $dsn = "mysql:host=$databasehost;dbname=$database;charset=UTF8";
    $pdo = new PDO($dsn, $databaseuser, $databasepassword);
    return $pdo;
}
function fetchAll($sql,$params=null){
    $pdo = connect_to_db();
    $stmt = $pdo->prepare($sql);
    if($params!=null)
        $stmt->execute($params);
    return $stmt->fetchAll();
}
function authorize($username,$password){
    global $salt1, $salt2;
    $loginString = $salt1.$password.$salt2;
    $sql = "SELECT * FROM user where login = :u and password = md5(:p) ;";
    $params = [":u"=>$username,":p"=>$loginString];
    //send to database to check for user
    $rowInDB = false;
    $pdo = connect_to_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //if user is there
    if(is_array($user) && isset($user["first"]))
        return $user;
    else
        return false;
}