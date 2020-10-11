<?php

session_start();
require "helper.php";
$db = database();

if(isset($_SESSION["id"])){
    $userID = $_SESSION["id"];
    $q = $db->query("SELECT email, verified, id FROM users WHERE id= $userID");
    $q = $q->fetchAll();
    $body = $_POST["body"];
    $posterid = $q[0]["id"]; //i am aware of what i am doing
    $postid = $_GET["postid"];

    if(getDomain($q[0]["email"]) === "????" && $q[0]["verified"] === '1' && strlen(trim($body)) !== 0){
        $body = sanitize($body);

    	$nReply = $db->prepare("INSERT INTO replies (postid, posterid, body) VALUES (:postid, :posterid, :body)");

		$nReply->execute(array("postid" => $postid, "posterid" => $posterid, "body" => $body));

        $upd = $db->query("SELECT replies FROM posts WHERE postid = $postid");
        $upd = $upd->fetch();
        $upd = (int)$upd[0];
        $upd++;

        $repl = $db->prepare("UPDATE posts SET replies = '$upd' WHERE postid = $postid");
            $repl->execute();
    }
    else
        header("location:index.php");
}
else
    header("location:index.php");

header("location:discussionView.php?postid=".$postid);
