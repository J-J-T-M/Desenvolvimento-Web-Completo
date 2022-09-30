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
    $nome = 'Jonatham';
    $email = 'jonatham@hotmail.com';
    $idade = 21;
    // para usar assim tem que colocar as aspas duplas 
    echo "nome: $nome email: $email idade: $idade <br>";
    // ou pode usar assim porem acho mais cansativo
    echo 'nome: '.$nome .'email: '.$email .'idade: '.$idade .'<br>';
    echo $idade + 1;
    echo '<br>';
    
    // PARA DECLARA UMA CONSTANTE TEM QUE USAR A FUNÇÃO DEFINE PASSANDO O NOME E O VALOR 
    // POREM NO NOME NÃO PRECISA COLOCAR O $
    define ('BD_URL','https://www.google.com/');
    define('BD_USUARIO' , 'Root');
    define('BD_SENHA', '0123456789');

    echo 'URL: '.BD_URL.' USUARIO: '.BD_USUARIO.' SENHA: **************';
    
    ?>
    
 
</body>
</html>