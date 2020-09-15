<?php

session_start();
require "helper.php";
$db = database();

$userID = $_SESSION["id"];
$q = $db->query("SELECT vtoken FROM users WHERE id=$userID");
$q = $q->fetchAll();

$vtoken = $q[0]["vtoken"];
$v = $_POST["verification"];

if ($_POST["displayName"] === null)
	$d = 0;
else
	$d = 1;


if ($vtoken === $v){
	$query = $db->prepare("UPDATE users SET verified = 1 WHERE id = $userID");
	$query->execute();
}

$query = $db->prepare("UPDATE users SET display = $d WHERE id = $userID");
$query->execute();

header("location:index.php");