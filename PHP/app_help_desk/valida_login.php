<?php
    session_start();

    $_SESSION['authentication'] = false;
    // variavel que verefica se a autenticação foi realizada
    $authentication = false;
    $idUser = null;
    $emailUser = null;
    $userProfilesId = null;
    // $ip_add = $_SERVER['REMOTE_ADDR'];
    // array de perfis 
    $profiles = array(1 => 'Administrator', 2 => 'User');
    //usuários do sistema
    $users_app = array(
        array('id' => 1 ,'email' => 'adm@teste.com.br', 'password' => '123456', 'profilesId' => 1),
        array('id' => 2 ,'email' => 'user@teste.com.br', 'password' => '123', 'profilesId' => 2),
        array('id' => 3 ,'email' => 'user1@teste.com.br', 'password' => '123', 'profilesId' => 2),
        array('id' => 4 ,'email' => 'user2@teste.com.br', 'password' => '123', 'profilesId' => 2)
    );
    // verifica a autenticação do usuario
    foreach ($users_app as $user) {
    //    $user['email'] == $_POST['email'] && $user['password'] == $_POST['password'] ? $authentication = true : $authentication ;
        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']  ){
            $authentication = true;
            $idUser = $user['id']; 
            $emailUser = $user['email'];
            $userProfilesId = $user['profilesId'];
        } 
    }
    // atraves da autenticação ela libera a prox pag ou volta ao index
    if ($authentication) {
        $_SESSION['authentication'] = true;
        $_SESSION['id'] = $idUser;
        $_SESSION['email'] = $emailUser;
        $_SESSION['profilesId'] = $userProfilesId;
        // $_SESSION['ip'] = $ip_add; 
        header('Location: home.php');
    } else {
        $_SESSION['authentication'] = false;
        header('Location: index.php?Login=erro');
    }





?>