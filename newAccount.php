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
        <div class="login">
    	<h2>sign up</h2>
        <h4>usernames must be unique and less than 12 characters<br>
        there is no password reset, so remember your password<br>
        emails must include an @, email can be fake, must be real to become verified</h4>
        <form action = "process_create.php" method = "post">
            *Username:
            <input type = "text" name = "id">
            <br>*Password:
            <input type = "password" name = "password">
            <br>*Email:
            <input type = "text" name = "email">
            <br>
            <input type = "submit" name = "add" value = "Create" class = "">
        </form>
        </div>
        <div class="login"><h5>* means required, but you knew that</h5></div>
    </body>
</html>