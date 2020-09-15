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
    <?php
    $pid = $_GET["postid"];
    $q = $db->query("SELECT * FROM posts WHERE postid = $pid");
    $q = $q->fetchAll();
    $pu = $q[0]["posterid"];

    $pQ = $db->query("SELECT username FROM users WHERE id=$pu");
    $pQ = $pQ->fetchAll();

    echo "<div class='posts'><h3>" . $q[0]["title"] . "</h3>";
    echo "<em>" . $pQ[0]["username"] . "</em> posted this " . $q[0]["posted"] . "<br>";
    echo nl2br("<h5>" . $q[0]["body"] . "</h5></div>");

    echo "<br>";
    $numReply = $q[0]["replies"];
    if($numReply > 0)
        echo "<div class='replies'>";

    //replies
    $q = $db->query("SELECT * FROM replies WHERE postid=$pid");
    $q = $q->fetchAll();
    for($i = 0;$i < count($q); $i++){
        $piid = $q[$i]["posterid"];
        $pQ = $db->query("SELECT username FROM users WHERE id=$piid");
        $pQ = $pQ->fetch();
        $pQ = $pQ[0];
        echo "<em>" . $pQ ." answered</em> at ". $q[$i]["posted"] ."<br><div class = 'line'>". $q[$i]["body"]."</div><br>";
    }
    if($numReply > 0)
        echo "</div>";
    ?>
        

    <h2>reply</h2>
    <h4>your reply should be thoughtful with helpful information<br>you should try to guide the asker to the answer without giving it away<br>please keep responses on topic</h4>
    <?php $act = "process_reply.php?postid=".$pid;
    echo '<form action = "'.$act.'" method = "post">';?>
    <textarea name = "body" maxlength="1024" style="width:400px;height:200px;padding:3px"></textarea>
    <br>
    <input type = "submit" name = "reply" value = "Reply">
    </form>

    </div> 
    </div>
    </body>
</html>
