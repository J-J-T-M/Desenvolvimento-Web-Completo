<?php

use FTP\Connection;

    $dsn = 'mysql:host=localhost; dbname=php_com_pdo';
    $user = 'root';
    $password = '';

    
    try
    {
        $connection = new PDO($dsn, $user, $password);

        $query = '
            select * from tb_usuarios
        ';
        // $stmt = $connection->query($query);
        // $list_user = $stmt->fetchAll(PDO::FETCH_ASSOC);//traz a pesquisa com os nomes das indice(colunas) associativa
        //$list = $stmt->fetchAll(PDO::FETCH_NUM);//traz a pesquisa com os  indice(colunas) numericos
        //$list = $stmt->fetchAll(PDO::FETCH_BOTH);//ambos
        // $list = $stmt->fetchAll(PDO::FETCH_OBJ);// traz a pesquisa como um objeto
        // echo '<pre>';
        //     print_r($list);
        // echo '</pre><hr>';
        // $query = '
        //     select * from tb_usuarios where id = 4
        // ';
        // $stmt = $connection->query($query);
        // $list = $stmt->fetch(PDO::FETCH_OBJ);//traz unico registro
        // echo '<pre>';
        //     print_r($list);
        // echo '</pre>';
     
        // foreach ($list_user as $key => $value) 
        // {
        //     echo ($value['name']);
        //     echo '<hr>';

        // }
        foreach($connection->query($query) as $key => $value)
        {
            print_r($value['name']);
            echo '<hr>';
        }

    }
    catch(PDOException $e)
    {

        echo 'Erro: '. $e->getCode(). ' Mensagem: '. $e->getMessage();
        //registrar o erro de alguma forma

    }
    


?>