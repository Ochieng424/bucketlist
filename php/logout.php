<?php
  session_start();
  unset($_SESSION['user']);
  function redirect($url){
     ob_start();
     header('Location: '.$url);
     ob_end_flush();
     die();
     }
     redirect('../home.php');
  die();

?>