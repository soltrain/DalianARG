<?php
  session_start();
  if (!$_SESSION['signed_in']) {
  	ini_set( 'default_charset', 'UTF-8' );
    echo "请先登录";
    echo "<meta http-equiv='refresh' content='3; index.html' />";
 //   header("Location: /~soltrain/DalianARG/index.html");
    exit; // IMPORTANT: Be sure to exit here!
  }
?>