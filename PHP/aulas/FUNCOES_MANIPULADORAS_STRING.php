<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <?php
    $texto = "pHP não é melhor que Java";
    echo (strtolower($texto));// ->Transforma todos os caracteres em minusculo
    echo'<hr>';
    echo (strtoupper($texto));// ->Transforma todos os caracteres em maiúsculo 
    echo'<hr>';
    echo (ucfirst($texto));// -> Transforma o primeiro carácter em maiúsculo
    echo'<hr>';
    echo (strlen($texto));// -> conta a quantidade de cacteres da string
    echo'<hr>';
    echo str_replace('pHP','Javascript',$texto);// ->localiza e substitui 
    echo'<hr>';
    echo substr($texto,22,5);// ->Retorna parte de uma string 
    echo'<hr>';

    ?>
    
 
</body>
</html>