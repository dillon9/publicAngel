<?php
function database (){
	$mysql = new PDO ("mysql:host=127.0.0.1:8889;dbname=angelctfdb","root","root");
	return $mysql;
}

function getDomain($email){
for($i = strlen($email)-1;$i > 0;$i--){
    if ($email[$i] === "@")
        return substr($email, $i, strlen($email));
    }
    return -1;
}

function sanitize($string){
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}