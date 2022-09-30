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
    $registros = array(
        array('Titulo' => "Titulo 1", 'conteudo' => "Conteudo 1"),
        array('Titulo' => "Titulo 2", 'conteudo' => "Conteudo 2"),
        array('Titulo' => "Titulo 3", 'conteudo' => "Conteudo 3"),
        array('Titulo' => "Titulo 4", 'conteudo' => "Conteudo 4"),
        array('Titulo' => "Titulo 5", 'conteudo' => "Conteudo 5")
    );
    echo"<pre>";
        print_r($registros);
    echo"</pre>";
    
    $idx = 0;
    while ($idx < count($registros)){
        echo "<h3>" .$registros[$idx]['Titulo']. "</h3>";
        echo "<p>" .$registros[$idx]['conteudo']. "</p>";
        echo "<br><hr>";
        $idx ++;
    }
    ?>
    
 
</body>
</html>