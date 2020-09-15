<?php
session_start();
require "helper.php";
$u = $_SESSION["id"];
$db = database();
$points = $db->query("SELECT points FROM users WHERE id = $u");
$points = $points->fetch();
$points = (int)$points[0];

function flagWin($db, $u, $points, $flag){
		$f = $flag;
		$q1 = $db->query("SELECT timesSolved FROM challenges WHERE id = $flag");
		$q1 = $q1->fetch();
		$q1 = (int)$q1[0];
		
		if($flag <= 3){
			$points += 50;
			$dbCheck = "easy".$f;
		}
		else if($flag <= 6 && $flag >= 4){
			$points += 125;
			$dbCheck = "medium".(string)($f-3);
		}
		else if($flag >= 7){
			$points += 300;
			$dbCheck = "hard".(string)($f-6);
		}


		$available = $db->query("SELECT $dbCheck FROM users WHERE id = $u");
		$available = $available->fetch();
		$available = (int)$available[0];


		if($available === 0){
			$q1++;
			$add = $db->prepare("UPDATE challenges SET timesSolved = '$q1' WHERE id = $flag");
			$add->execute();
			$p = $db->prepare("UPDATE users SET points = '$points' WHERE id = $u");
			$p->execute();
			$c = $db->prepare("UPDATE users SET $dbCheck = 1 WHERE id = $u");
			$c->execute();
			//header("location:index.php");
		}
		else{
			header("location:index.php");
		}
}

function flagLose($db, $u, $points){
	$points -= 5;
	$subtract = $db->prepare("UPDATE users SET points = '$points' WHERE id = $u");
	$subtract->execute();
}
//easy
if (isset($_POST["easy"])){
	if($_POST["easy"] === ""){
		flagWin($db, $u, $points, 1);
	}
	else{
		flagLose($db, $u, $points);
	}
}
else if(isset($_POST["easy2"])){
	if($_POST["easy2"] === ""){
		flagWin($db, $u, $points, 2);
	}
	else{
		flagLose($db, $u, $points);
	}
}
else if(isset($_POST["easy3"])){
	if($_POST["easy3"] === ""){
		flagWin($db, $u, $points, 3);
	}
	else{
		flagLose($db, $u, $points);
	}
}
//medium
else if (isset($_POST["medium"])){
	if($_POST["medium"] === ""){
		flagWin($db, $u, $points, 4);
	}
	else{
		flagLose($db, $u, $points);
	}
}

else if (isset($_POST["medium2"])){
	if($_POST["medium2"] === ""){
		flagWin($db, $u, $points, 5);
	}
	else{
		flagLose($db, $u, $points);
	}
}

else if (isset($_POST["medium3"])){
	if($_POST["medium3"] === ""){
		flagWin($db, $u, $points, 6);
	}
	else{
		flagLose($db, $u, $points);
	}
}
//hard
else if (isset($_POST["hard"])){
	if($_POST["hard"] === ""){
		flagWin($db, $u, $points, 7);
	}
	else{
		flagLose($db, $u, $points);
	}
}

else if (isset($_POST["hard2"])){
	if($_POST["hard2"] === ""){
		flagWin($db, $u, $points, 8);
	}
	else{
		flagLose($db, $u, $points);
	}
}

else if (isset($_POST["hard3"])){
	if($_POST["hard3"] === ""){
		flagWin($db, $u, $points, 9);
	}
	else{
		flagLose($db, $u, $points);
	}
}

header("location:index.php");

