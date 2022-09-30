<?php

  session_start();
  if(!isset($_SESSION['authentication']) || $_SESSION['authentication'] != true){
    header('Location: index.php?Login=falha_Autenticacao');
  }

?>