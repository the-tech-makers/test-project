<?php

if(!isset($_SESSION)) {
  session_start();
}

if( $_SESSION['user_id'] != '' ){

  session_destroy();
  unset($_SESSION['user_id']);
  unset($_SESSION['name']);
  unset($_SESSION['email']);

  header("Location: login.php");
}

?>