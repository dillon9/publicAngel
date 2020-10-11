<?php session_start();

require "helper.php";
$db = database();

if(isset($_SESSION["id"])){
    $userID = $_SESSION["id"];
    $q = $db->query("SELECT email, verified FROM users WHERE id=$userID");
    $q = $q->fetchAll();

    if(getDomain($q[0]["email"]) === "?????" && $q[0]["verified"] == 1){
    }
    else
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
    
<h2>new post</h2>
        <h4>describe your problem in as much detail as possible<br>
        include what you have tried</h4>
        <form action = "process_post.php" method = "post">
            <input type="radio" id="CS109" name="cid" value="CS109"checked> CS109<br>
            <input type="radio" id="CS107" name="cid" value="CS107"> CS107<br>
            <input type="radio" id="CS903" name="cid" value="CS903"> CS903<br>
            <input type="radio" id="CS212" name="cid" value="CS212"> CS212<br>
            <br>Title<br>
            <input type = "text" name = "title" maxlength="64">
            <br>Body<br>
            <textarea name = "body" maxlength="4096" style="width:400px;height:200px;padding:3px"></textarea>
            <br>
            <input type = "submit" name = "post" value = "Post" class = "">
        </form>



    </div>

    </div>
    </body>
</html>
