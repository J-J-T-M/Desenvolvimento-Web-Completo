<!DOCTYPE html>
<html lang="PT-BR ">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <?php
    $array = array( 'melancia','maça' , 'morango' ,'banana', 'uva', 'abacate');
    $noarray = "PHP";

    $retorno = is_array($array); 
    echo " Verifica se o parâmetro é um array";
    echo"<br>";
    $retorno ? print"É um array: " : print "Não é um array: "; 

    echo"<br>";

    $retorno = is_array($noarray); 
    
    $retorno ? print"É um array: " : print "Não é um array: "; 

    echo"<br>";

    echo "<hr>";
    
    echo "<pre>";
        print_r($array);
    echo "</pre>";

    $chaves_array = array_keys($array); 
    echo " Retorna todas as chaves de um array em outro array";
    
    echo "<pre>";
        print_r($chaves_array);
    echo "</pre>";

    echo "<hr>";
    
    echo "<pre>";
        print_r($array);
    echo "</pre>";
       sort($array); 
       echo " Ordena um array e reajusta o seu indices";
    echo "<pre>";
        print_r($array);
    echo "</pre>";

    echo "<hr>";
   
    echo "<pre>";
        print_r($array);
    echo "</pre>";
       asort($array); 
       echo " Ordena um array preservando o seu indices";
    echo "<pre>";
        print_r($array);
    echo "</pre>";   

    echo "<hr>";
   
    echo    count($array); 
    echo "<br>";
    echo "Conta a quantidades de elementos de um array";

    echo "<hr>";
   
    $array2 = array( 'melancia','maça' , 'morango' ,'banana', 'uva', 'abacate');
    $array3 =  array_merge($array, $array2); 
    echo " Funde um ou mais array";
    echo "<pre>";
        print_r($array3);
    echo "</pre>";

    echo "<hr>";

    $string = '20/12/2000';
    $array = explode('/',$string); 
    echo "Divide uma string baseada em um delimitador";
    echo "<pre>";
        print_r($array);
    echo "</pre>";

    echo "<hr>";

    $string = implode(' - ',$array); 
    echo "<pre>";
        print_r($array);
    echo "</pre>";
    echo "Junta elementos de um array em uma string";
    echo "<br>";
    echo $string; 




    ?>
    
 
</body>
</html>