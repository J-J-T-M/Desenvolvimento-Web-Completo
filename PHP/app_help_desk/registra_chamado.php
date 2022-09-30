<?php
    session_start();
    // abrindo o arquivo
    $file = fopen("arquivo.txt", "a");
    $text = $_SESSION['id'].' - '.$_SESSION['email'].' - '.$_POST["titulo"].' - '.$_POST["categoria"].' - '.$_POST["descricao"].PHP_EOL;
    // escrevendo
    fwrite($file, $text);
    // fechando
    fclose($file);
    header("location: abrir_chamado.php?parametro=sucesso");

?>