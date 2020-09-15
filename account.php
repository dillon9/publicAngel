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

<div class="featca">
<?php

    require "helper.php";
    $db = database();

    if(!(isset($_SESSION["id"]))){
        echo "<h4>You must be logged in to see this page.</h4>";
            }
    else{
    $userID = $_SESSION["id"];
    $q = $db->query("SELECT username, email, verified, vtoken, display, points FROM users WHERE id=$userID");
    $q = $q->fetchAll();

    $domain = getDomain($q[0]["email"]);

    if(isset($_GET["verify"]) && $_GET["verify"] === "yes"){
        $to = $q[0]["email"];
        $subject = "Verification";
        $txt = "Use the following token to get verified\n".$q[0]["vtoken"];
        $headers = "From: no-reply@angelctf.com";

        mail($to,$subject,$txt,$headers);
    }

    echo "<br>";
    echo "You are currently logged in as: " . $q[0]["username"];
    echo "<br>You have " . $q[0]["points"] . " points";
    echo "<br>";

    echo "Your email is: " . $q[0]["email"];
    echo "<br>";
    echo '<form action = "process_account.php" method = "post">';

    if ($domain === "@buckley.org"){
        if($q[0]["verified"] === "1"){
            echo 'Your email address is verified and you have access to the <a href = "discussion.php">discussion board</a><br>';
        }
        else{
            echo "Your email address is not verified and you do not have access to the discussion board <br>";
            echo 'Verification token: <input type = "text" name = "verification"> ';
            echo "<a href = account.php?verify=yes>Get Verified</a><br>";
           
            }
        }

    if ($q[0]["display"] === '1'){
        echo "Display name on leaderboard: ";
        echo '<input type = "checkbox" name = "displayName" value = 1 checked>';
    }
    else{
        echo "Display name on leaderboard: ";
        echo '<input type = "checkbox" name = "displayName" value = 0>';
    }
    echo '
    <br>
    <br>
    <input type = "submit" name = "acc" value = "Save Changes">
    </form>';
}
        
?>
  
</div>

</div>
    </body>
</html>
