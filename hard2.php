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
        <h4>
        <div class="featca">
        <?php 
            if(!(isset($_SESSION["id"]))){
                echo "You must be logged in to see this page.";
            }
            else{
                echo '
                <form action = "process_flags.php" method = "post">
                hard 2:
                <input type = "text" name = "hard2">
                <input type = "submit" name = "hardSubmit" value = "Submit" class = "">
                </form>
                <br>
                oh no i <a href ="flags/hard2.out
">overflowed</a> my lemonade
                <br>';
            }
        ?>
        </div>
    </h4>

    </body>
</html>