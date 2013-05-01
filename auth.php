<?php
  session_start();
  if (!$_SESSION['signed_in']) {
    echo "Login required";
    echo "<meta http-equiv='refresh' content='2; index.html' />";
 //   header("Location: /~soltrain/DalianARG/index.html");
    exit; // IMPORTANT: Be sure to exit here!
  }
?>