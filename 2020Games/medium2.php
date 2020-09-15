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
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="icon" href="../css/favicon.ico">
    </head>
    <body>
        <h4>
        <div class="featca">
        <?php 
                if(isset($_GET['flag'])){
                    if($_GET['flag'] === "true"){
                    echo 'dont worry, it gets harder<br> flag=cake tastes bad
                    <br>
                    $GET <em>$$$</em>... flag is false
                    <br>';

                        }
                    }
                else{
                echo '
                <br>
                $GET <em>$$$</em>... flag is false
                <br>';
                }
            
        ?>
        <details><summary>answer:</summary><span class="spoiler">cake tastes bad</span></details>
        </div>
    </h4>


    </body>
</html>