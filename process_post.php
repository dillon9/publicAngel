<?php

session_start();
require "helper.php";
$db = database();

if(isset($_SESSION["id"])){
    $userID = $_SESSION["id"];
    $q = $db->query("SELECT email, verified, id FROM users WHERE id= $userID");
    $q = $q->fetchAll();
    $title = $_POST["title"];
    $body = $_POST["body"];
    $classid = $_POST["cid"];
    $posterid = $q[0]["id"];
    if(getDomain($q[0]["email"]) === "????" && $q[0]["verified"] === '1' && strlen(trim($title)) !== 0 && strlen(trim($body)) !== 0){
        $body = sanitize($body);
        $title = sanitize($title);

    	$newPost = $db->prepare("INSERT INTO posts (posterid, title, body, classid) VALUES (:posterid, :title, :body, :classid)");
		$newPost->execute(array("posterid" => $posterid, "title" => $title, "body" => $body, "classid" => $classid));
    }
    else
        header("location:index.php");
}
    else
        header("location:index.php");

header("location:discussion.php");
