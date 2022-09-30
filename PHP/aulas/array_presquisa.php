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
       

        $lista_frutas2 = array('banana' ,'maça' , 'morango' , 'uva');
        echo "<pre>";
            var_dump($lista_frutas);
        echo '</pre>';

        // in_array("itemAserPesquisado", $array); -> retorna true ou false ou vazio para o item procurado
        // array_search("itemAserPesquisado", $array); -> retorna a posição do item procurado no array ou null ou vazio
        echo in_array("maça", $lista_frutas); 
        echo'<hr>';
        echo array_search("uva", $lista_frutas); 

    ?>
    
 
</body>
</html>