<!DOCTYPE html>
<html lang="PT-BR  ">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <?php
        
    $lista_frutas = array();
    $lista_frutas['frutas'] = array();

    $lista_frutas['frutas'][0]="banana";
    $lista_frutas['frutas'][1]="maçã";
    $lista_frutas['frutas'][2]="morango";
    $lista_frutas['frutas'][3]="uva";

    $lista_frutas['pessoas'] = [];
    
    $lista_frutas['pessoas']['a'] = "J";
    $lista_frutas['pessoas']['b'] = "J";
    $lista_frutas['pessoas']['c'] = 'T';
    $lista_frutas['pessoas']['d'] = "M";
    
    echo "<pre>";
            var_dump($lista_frutas);
        echo '</pre>';
        echo '<pre>';
            print_r($lista_frutas);
        echo '</pre>';


    ?>
    
 
</body>
</html>