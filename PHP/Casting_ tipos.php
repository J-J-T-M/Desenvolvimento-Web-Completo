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
    $valor = 10;
    $valor0 = 15.38;
    echo gettype($valor);
    $valor2 = (float)$valor;
    echo "<br/>";
    echo gettype($valor2);
    echo "<br/>";
    $valor3 = (string)$valor;
    echo gettype($valor3);
    echo "<br/>";
    $valor4 = (int)$valor0;
    echo gettype($valor4);
    echo "<br/>";
    echo $valor4;
    echo "<br/>";


    ?>
    
 
</body>
</html>