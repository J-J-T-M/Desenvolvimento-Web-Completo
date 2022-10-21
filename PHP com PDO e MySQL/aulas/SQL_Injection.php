<?php
use FTP\Connection;
    if(!empty($_POST['user']) && !empty($_POST['password']))
    {
        $dsn = 'mysql:host=localhost; dbname=php_com_pdo';
        $user = 'root';
        $password = '';

        
        try
        {
            $connection = new PDO($dsn, $user, $password);
            
            // $query = "select * from tb_usuarios where"; // não usar assim 
            // $query .= " email = '{$_POST['usuario']}' ";// não usar assim 
            // $query .= " AND senha = '{$_POST['senha']}'";// não usar assim 


            $query = "select * from tb_usuarios where";
            $query .= " email = :user "; // usar como variavel :user
            $query .= " AND pass_word = :pass_word ";// usar como variavel :pass_word
            
            //$stmt = $connection->query($query); // não fazer isso usar antes o metodo prepare

            $stmt  = $connection->prepare($query);
            
            $stmt->bindValue('user',$_POST['user']);
            $stmt->bindValue('pass_word',$_POST['password']);

            $stmt->execute();

            $user = $stmt->fetch();

            
            echo "<hr><pre>"; print_r($user); echo "</pre>";

        }catch(PDOException $e)
        {

            echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
            //registrar o erro de alguma forma

        }
    
    }

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>
</head>
<body>
<form method="post" action="SQL_Injection.php">
        <input type="text" placeholder="User" name="user"/>
        <br/>
        <input type="password" placeholder="Password" name="password"/>
        <br/>
        <button type="submit">Entrar</button>
    </form>
    
</body>
</html>