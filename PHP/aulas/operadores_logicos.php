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
    if( 4 == 4 XOR 10 > 15){
        echo 'Verdadeiro';
    }else {
        echo 'Falso';
    }
    echo '<hr>';
    //  V XOR V = F
    if( 4 == 4 XOR 10 < 15){
        echo 'Verdadeiro';
    }else {
        echo 'Falso';
    }
    echo '<hr>';
    //  F XOR F = F
    if( 4 != 4 XOR 10 > 15){
        echo 'Verdadeiro';
    }else {
        echo 'Falso';
    }
        


    
    ?>
    
 
</body>
</html>