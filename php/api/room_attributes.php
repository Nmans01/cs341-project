<?php
session_start();
require("../db_functions.php");
$pdo = connect_to_db();

header('Content-Type: application/json; charset=utf-8');

if (!isset($_POST['room'])){
    echo json_encode([]);
    return;
}

$room = $_POST['room'];

$stmt = $pdo->prepare(
    "SELECT categoryName, displayName
    FROM attribute
    JOIN roomAttribute ON attribute.attributeName=roomAttribute.attribute_attributeName
    WHERE room_roomID = :room;"
);
$stmt->execute(array('room'=>$room)); 
$result = $stmt->fetchAll(PDO::FETCH_GROUP);

echo json_encode($result);