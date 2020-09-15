<?php

session_start();
require "helper.php";
if (isset($_POST["add"])){
	$db = database();
	$id = $_POST["id"];
	$id = substr($id, 0, 12);
	$password = $_POST["password"];

	$email = $_POST["email"];

	if(getDomain($email) !== -1 && strlen(trim($id)) !== 0 && strlen(trim($password)) !== 0){
	
	$salt = substr(bin2hex(random_bytes(32)), 0, 64);

	$password = crypt($password, $salt);
	$query = $db->prepare("SELECT * FROM users WHERE username = :user");
	$query->execute(array("user"=>$id));

	$q3 = $db->prepare("SELECT * FROM users WHERE email = :email");
	$q3->execute(array("email"=>$email));
	

	$all = $query->fetch();
	$aE = $q3->fetch();

	if (!$all && !$aE){
		$vtoken = substr(bin2hex(random_bytes(32)), 0, 64);
		$result = $db->prepare("INSERT INTO users (username, password, email, vtoken, salt) VALUES (:id, :pass, :email, :vtoken, :salt)");
		$result->execute(array("id" => $id, "pass" => $password, "email" => $email, "vtoken" => $vtoken, "salt" => $salt));
	}
}
}

header("location:index.php");