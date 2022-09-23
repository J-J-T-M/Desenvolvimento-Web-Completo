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
    //  V XOR F = V
    $opcao= 2;
    switch ($opcao) {
        case 1:
            echo "<h1>Curso PHP</h1>";
            break;
        case 2: 
            echo "<h1>Curso JAVA</h1>";
            break;
        default: 
            echo "<h1>Opção invalida</h1>";
            break;
    }
    ?>
    
 
</body>
</html>