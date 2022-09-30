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
    $listaFuncionarios = array(
        array('nome' => 'Viviane', 'salario' => 25000, "data_nascimento" =>'20/08/1988'),
        array('nome' => 'Rose', 'salario' =>1800),
        array('nome' => 'Miguel', 'salario' =>1500),
        array('nome' => 'Lucas', 'salario' =>2000), 
        array('nome' => 'Fernanda', 'salario' =>6000)
    );

    echo '<pre>';
        print_r($listaFuncionarios);
    echo '</pre>';

    foreach ($listaFuncionarios as $idx => $funcionarios){
        
        echo '<pre><hr>';
            print_r($funcionarios)  ;
        echo '</pre>';
        
        foreach($funcionarios as $idx2 => $funcionario){
            echo "ID: $idx2 Valor: $funcionario <br/>" ;
        }
    }
    ?>
    
 
</body>
</html>