<?php

require "../connection.php";
session_start();
$clientID = $_SESSION['user_id'];
$menu = $_POST['menu'];
$datereservation = $_POST['datereservation'];
$heur = $_POST['heur'];
$nombrePersone = $_POST['nombrePersone'];

$sql = "insert into reservation(clientId,menuId,datereservation,heur,nombrePersone,status) values('$clientID','$menu','$datereservation','$heur','$nombrePersone','en attente')";
mysqli_query($db,$sql);
