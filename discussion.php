<?php session_start();

require "helper.php";
$db = database();

if(isset($_SESSION["id"])){
    $userID = $_SESSION["id"];
    $q = $db->query("SELECT email, verified FROM users WHERE id=$userID");
    $q = $q->fetchAll();

    if(getDomain($q[0]["email"]) !== "@buckley.org" || $q[0]["verified"] !== '1')
    header("location:index.php");
}
else
    header("location:index.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>angel ctf</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="css/favicon.ico">
    </head>
    <body>
        <header><?php require "navbar.php";?></header>
    <div class="featca">
        <h4>Posts:</h4>
        Sort by class - <a href = "discussion.php?classId=CS109">CS109</a> -
        <a href = "discussion.php?classId=CS107">CS107</a> -
        <a href = "discussion.php?classId=CS903">CS903</a> -
        <a href = "discussion.php?classId=CS212">CS212</a> -
        <a href = "discussion.php">Unsorted</a>
        <br><br>
        <a href = "newPost.php"><strong>New Post</strong></a>
        <br><br>

    <?php

    if(!(isset($_GET["classId"]))){
        $q = $db->query("SELECT * FROM posts");
    }
    else{
        $cid = trim($_GET["classId"]);
        $q = $db->query("SELECT * FROM posts WHERE classid = '$cid'");
    }

    $q = $q->fetchAll();
    for ($i = 0; $i < count($q); $i++){
        $pid = $q[$i]["posterid"];
        $pQ = $db->query("SELECT username from users WHERE id=$pid");
        $pQ = $pQ->fetchAll();
        echo "<a href = discussionView.php?postid=" . $q[$i]["postid"] . "><h5>" . $q[$i]["classid"] . " " . $q[$i]["title"] . "</a></h5>" . $pQ[0]["username"] . " posted " . $q[$i]["posted"] . "<strong> - " . $q[$i]["replies"] . " replies</strong>" . "<br>";
    }

    ?>

    </div>

    </div>
    </body>
</html>
