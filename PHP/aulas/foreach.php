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
    $listaFuncionarios = ['Viviane', 'Rose', 'Miguel', 'Lucas', 'Fernanda' ];

    echo '<pre>';
        print_r($listaFuncionarios);
    echo '</pre>';

    foreach ($listaFuncionarios as $funcionarios) {
        echo "Os nome do funcionario: $funcionarios <br/>";
    }


    ?>
    
 
</body>
</html>