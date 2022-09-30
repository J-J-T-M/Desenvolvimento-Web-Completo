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
        
        echo date("d/m/Y H:i"); // -> Recuperar a data atual
        echo'<hr>';
        echo date_default_timezone_get(); // -> Recuperar o timezone default da aplicação
        echo'<hr>';
        date_default_timezone_set('America/Cuiaba'); // -> Atualizar o timezone default da aplicação
        echo'<hr>';
        echo date("d/m/Y H:i"); // -> Recuperar a data atual
        echo'<hr>';
        echo date_default_timezone_get(); // -> Recuperar o timezone default da aplicação
        echo'<hr>';
        echo'<br>';
        echo'<br>';
        echo'<br>';
        echo'<hr>';

        
        
        $data_inicial = '2000-12-20';
        echo "Data inicial ".$data_inicial;
        echo'<hr>';

        $data_final = date('Y-m-d');
        echo "Data final ".$data_final;
        // timestramp 
        // 01/01/1970 -- 2000-12-20 retorno js-> milisegundos / php-> segundos

        $time_inicial = strtotime($data_inicial); // -> Transformar datas textuais em segundos
        $time_final = strtotime($data_final);

        echo $data_inicial.' - '.$time_inicial;
        echo'<hr>';

        echo $data_final.' - '.$time_final;
        echo'<hr>';

        $diferenca_times = $time_final - $time_inicial;

        echo "A diferencia de segundos entre a data inicial e final é: ".$diferenca_times;
        echo'<hr>';

        $diferenca_times /= 86400; // dividindo pela quanditade de segundos que tem no dia 
        $diferenca_times = ceil($diferenca_times);
        echo "A difênica de dias entre a  ".$data_inicial." até ".$data_final."é: ".$diferenca_times





    ?>
    
 
</body>
</html>