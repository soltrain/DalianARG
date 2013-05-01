<?php
ini_set( 'default_charset', 'UTF-8' );
session_start();
session_destroy();
session_start();
if ($_POST['password'] == "password" AND strlen($_POST['user'])==11)
{
	$_SESSION['signed_in'] = true;
    $_SESSION['pnumber']=$_POST['user'];
    echo "<meta http-equiv='refresh' content='2; control.html' />";
    echo "Password correct, now redirecting you...";
    echo "密码打得对";
    echo "Username length:" . strlen($_POST['user']);
    echo "<br/>Post variable: {$_POST['user']} <br/> Session Phone Number variable: {$_SESSION['pnumber']}";
    echo "<br/>Password: {$_POST['password']}";
}
else
{
	echo "<meta http-equiv='refresh' content='2; index.html' />";
    echo "Password or username incorrect";
    echo "密码大的错";
    $_SESSION['signed_in'] = false;
}

?>