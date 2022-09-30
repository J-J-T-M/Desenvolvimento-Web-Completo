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
        
        $lista_frutas = [];
        $lista_frutas[0] = "banana";
        $lista_frutas[1] = "maça";
        $lista_frutas[2] = "morango";
        $lista_frutas[3] = "uva";
        $lista_frutas[4] = 15;
        $lista_frutas[5] = true;
        $lista_frutas[6] = 6.36;

        $lista_frutas2 = array('banana' ,'maça' , 'morango' , 'uva');
        echo "<pre>";
            var_dump($lista_frutas);
        echo '</pre>';
        echo '<pre>';
            print_r($lista_frutas);
        echo '</pre>';
        


    ?>
    
 
</body>
</html>