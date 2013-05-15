<?php
ini_set( 'default_charset', 'UTF-8' );
session_start();
session_destroy();
session_start();
if ( (($_POST['password'] == "CERNET") OR ($_POST['password'] == "cernet" ) OR ($_POST['password'] == "Cernet" ) OR ($_POST['password'] == "cernet " ) OR ($_POST['password'] == "CERNET " )) AND strlen($_POST['user'])==11)
{
	$_SESSION['signed_in'] = true;
    $_SESSION['pnumber']=$_POST['user'];
    echo "<meta http-equiv='refresh' content='2; control.html' />";
    echo "密码正确，稍等。。。";
}
else
{
	echo "<meta http-equiv='refresh' content='2; index.html' />";
    echo "用户名或者密码不正确";
    $_SESSION['signed_in'] = false;
}

?>