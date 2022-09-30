<?php
session_start();

//remover índice udo array de sessão
// unset() remove índice de um array
// unset($_SESSION['x']);


//destruir a variável de sessão 
// session_destroy() destrua a sessão completamente
session_destroy(); 
header('Location: index.php');


?>