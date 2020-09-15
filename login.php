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
        <h2>Login</h2>
        <br>
        <?php if (isset($error)): ?>
        <div class="error"><?php echo $error ?></div>
    <?php endif; ?>
        <div class="row">
            <div class="span12">
        <form action = "process_login.php" method = "post">
            Username:
            <input type = "text" name = "id">
            <br>Password:
            <input type = "password" name = "password">
            <br>
            <input type = "submit" name = "login" value = "Login" class = "">
                </form>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>