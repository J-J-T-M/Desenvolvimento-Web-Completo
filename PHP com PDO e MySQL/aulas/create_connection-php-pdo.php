<?php

use FTP\Connection;

    $dsn = 'mysql:host=localhost; dbname=php_com_pdo';
    $user = 'root';
    $password = '';

    
    try
    {
        $connection = new PDO($dsn, $user, $password);

        $query = '
        create table if not exists tb_usuarios(
                id int not null primary key auto_increment,
                name varchar (50) not null,
                email varchar(100) not null,
                password varchar(32) not null
            )
    ';
        
     
        $return = $connection->exec($query);

        echo $return;

        $query = '
            insert into tb_usuarios
            (
                name, email, password
            )
            values
            (
                "JJTM","jjtm@teste.com.br","passwordteste"
        )      
        ';

        //$return = $connection->exec($query);

        echo $return;


    }
    catch(PDOException $e)
    {
        // echo '<pre>';
        //     print_r($e);
        // echo '</pre>';

        echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
        //registrar o erro de alguma forma

    }
    


?>