<?php
session_start();
require "helper.php";
$error = "";
$db = database();
if (isset($_POST["login"])){
	$username = $_POST["id"];
	$password = $_POST["password"];

	$sQ = $db->query("SELECT salt FROM users WHERE username = '$username'");
	$sQ = $sQ->fetchAll();
	$salt = $sQ[0]["salt"];
	$password = crypt($password, $salt);

	$query=$db->prepare("SELECT * FROM users WHERE username = :id && password = :pass");
	$query->execute(array("id"=>$username, "pass"=>$password));
	$checker = $query->fetch();
}
if ($checker){
	$_SESSION["id"] = $checker["id"];
	$_SESSION["users"] = $checker["username"];
	header("location:index.php");
	}
else{
	$error = "Invalid Credentials";
	header("location:login.php");
}
