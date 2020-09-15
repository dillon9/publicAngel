<?php session_start();?>
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
        <br>
        <div class="featcm">
            angelctf 2021 is live, good luck
            <br>
            <br>
            there's definitely some horrendous bug lurking under the surface so let me know if anything is awry
        </div>

<div class="leaderboard">
  <h3>Leaderboard:</h3>
<?php
    require "helper.php";
    $db = database();

    $q = $db->query("SELECT username, points FROM users WHERE display = 1 ORDER BY points DESC");
    $q = $q->fetchAll();

    for ($i = 0; $i < count($q); $i++){
        echo $q[$i]["username"] . " " . $q[$i]["points"];
      echo "<br>";
    }
?>
</div>
    </body>
</html>
